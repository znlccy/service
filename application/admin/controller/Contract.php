<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Contract as ContractModel;
use Mpdf\Mpdf;
use app\admin\model\Order;
use app\admin\model\OrderWorkplace;

class Contract extends BaseController
{
    /**
     * 显示资源列表
     *
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $id = request()->param('id');
        $contract_no = request()->param('contract_no');
        $status = request()->param('status/d');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'contract_no'       => $contract_no,
            'id'               => $id,
            'status'           => $status,
        ];
        $result = $this->validate($data, 'Contract.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($contract_no) {
            $conditions[] = ['contract_no', 'like', '%' . $contract_no . '%'];
        }
        if ($status || $status === 0) {
            $conditions[] = ['status', '=', $status];
        }
        $contract = ContractModel::where($conditions)
            ->with(['operator'])
            ->order('create_time', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page])->each(function($item) {
                unset($item['operator_id']);
                return $item;
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $contract]);
    }

    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        //
    }

    /**
     * 合同详情
     */
    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'Contract.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $detail = ContractModel::where($data)->find();
        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
    }

    /**
     * 删除指定资源
     *
     */
    public function delete()
    {
        //
    }


    /**
     * 合同确认签署
     */
    public function signing() {
        // 获取参数
        $id = request()->param('id');
        $sign_date = request()->param('sign_date', date('Y-m-d', time()));
        if (!strtotime($sign_date)) {
            return json(['code' => 401, 'message' => '签署日期格式不正确']);
        }
        // 验证参数
        $data = [
            'id' => $id,
            'sign_date' => $sign_date,
            'operator_id' =>session('admin.id'),
            // 合同状态(0=>待审核,1=>待签署,2=>已签署,3=>已失效,4=>即将失效)
            'status' => 2,
        ];
        $result = $this->validate($data, 'Contract.signing');

        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $result = ContractModel::where(['id' => $id])->update($data);
        if ($result) {
            return json(['code' => 200, 'message' => '确认签署成功']);
        }
        return json(['code' => 404, 'message' => '签署失败']);

    }

    /**
     * 合同下载
     */
    public function download()
    {
        // 获取参数
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'Contract.download');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 获取合同信息
        $contract = ContractModel::get($id);
        if (!empty($contract)) {
            // 获取订单信息
            $order_no = $contract->order_no;
            $order = Order::where('order_no',$order_no)
                ->with(['team'])
                ->find();
            if (!empty($order)) {
                // 公司名称
                $company_name = $order->team->company;
                // 标的物
                $order_workplaces = OrderWorkplace::where('order_id', $order->id)
                    ->with(['workplace', 'workplace.space'])
                    ->select();
                $space_data = [];
                foreach ($order_workplaces as $order_workplace) {
                    // 获取工位所属空间
                    $space = $order_workplace->workplace->space;
                    $space_data[] = $space;
                }
                $space_data = array_unique($space_data);
                // 拼接标的物
                $target = [];
                foreach ($space_data as $value) {
                    $str = $value->name . '【' . $value->address . '】的工位:';
                    $workplace_arr = [];
                    foreach ($order_workplaces as $order_workplace) {
                        $workplace = $order_workplace->workplace;
                        if ($workplace->space_id == $value->id) {
                            if ($workplace->type == 1) {
                                $workplace_arr[] = $workplace->workplace_no .'/'. $order_workplace->workplace_area .'m<sup>2</sup>';
                            } else {
                                $workplace_arr[] = $workplace->workplace_no;
                            }
                        }
                    }
                    $str = $str . join(',',array_values($workplace_arr));
                    $target[] = $str;
                }
                $target_str =join(';',array_values($target));
                // 合同年限
                $contract_years = $order->contract_years . '年';
                // 签署日期
                $sign_date = $contract->sign_date;
                // 定金
                $deposit = $order->deposit .'元';
                // 自定义内容
                $custom_content = json_decode($contract->custom_content, false);
                $custom = '';
                foreach ($custom_content as $k => $value) {
                    $custom = $custom . $k . ':'. $value .'<br>';
                }
            } else {
                return json(['code' => 404, 'message' => '下载失败(未找到该合同相关订单信息)']);
            }
        } else {
            return json(['code' => 404, 'message' => '下载失败(未找到该合同相关信息)']);
        }
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $html = file_get_contents('public/contract-temp/contract-template.html');
        // 替换html中的占位符
        $html = str_replace('{company_name}', $company_name, $html);

        $html = str_replace('{workplace}', $target_str, $html);
        $html = str_replace('{contract_years}', $contract_years, $html);
        $html = str_replace('{deposit}', $deposit, $html);
        $html = str_replace('{custom_content}', $custom, $html);
        $html = str_replace('{sign_date}', $sign_date, $html);

        $mpdf->WriteHTML($html);
        $mpdf->Output('contract.pdf', 'D');



    }
}
