<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Order as OrderModel;
use app\admin\model\Invoice;
use app\admin\model\OrderWorkplace;
use app\admin\model\Workplace;
use app\admin\model\Contract;
use think\Db;
use workflow\Db\ProcessDb;

class Order extends BaseController
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
        $order_no = request()->param('order_no');
        $status = request()->param('status/d');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'order_no'         => $order_no,
            'id'               => $id,
            'status'           => $status,
        ];
        $result = $this->validate($data, 'Order.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($order_no) {
            $conditions[] = ['order_no', 'like', '%' . $order_no . '%'];
        }
        if ($status) {
            $conditions[] = ['status', '=', $status];
        }
        $order = OrderModel::where($conditions)
            ->with('team')
            ->order('status')
            ->order('create_time', 'desc')
//            ->field("id,order_no,total_price,status,create_time,team_id")
            ->paginate($page_size, false, ['page' => $jump_page])->each(function ($item) {
//                unset($item['team_id']);
                return $item;
            });
//        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $order]);
        $this->assign('list', $order);
        return $this->fetch();
    }


    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        // 获取订单参数
        $order_no = 'OR' . uniqid();
        $team_id = request()->param('team_id');
        $contract_template_no = request()->param('contract_template_no');
        $effective_time = request()->param('effective_time', date('Y-m-d',time()));
        $contract_years = request()->param('contract_years');
        $pay_type = request()->param('pay_type');
        $deposit = request()->param('deposit');
        $custom_content = request()->param('custom_content');
        $discount = request()->param('discount');
        $remark = request()->param('remark');
        $order_status = request()->param('order_status/d', 0);
        $total_price = request()->param('total_price');
        $invoice_no = 'IN' . uniqid();
        // 获取发票参数
        $opener_type = request()->param('opener_type');
        $invoice_title = request()->param('invoice_title');
        $type = request()->param('invoice_type');
        $tax = request()->param('tax');
        $bank = request()->param('bank');
        $account = request()->param('account');
        $address = request()->param('address');
        $phone = request()->param('phone');
        $invoice_status = request()->param('invoice_status/d', 0);
        // 获取工位参数
        $workplaces = request()->param('workplaces');

        // 订单数据
        $order_data = [
            'order_no' => $order_no,
            'team_id' => $team_id,
            'contract_template_no' => $contract_template_no,
            'contract_years' => $contract_years,
            'pay_type' => $pay_type,
            'deposit' => $deposit,
            'discount' => $discount,
            'remark' => $remark,
            'operator_id' => session('admin.id'),
            'total_price' => $total_price,
            'status' => $order_status,
            'invoice_no' => $invoice_no,
        ];
        $result = $this->validate($order_data, 'Order');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        // 发票数据
        $invoice_data = [
            'invoice_no' => $invoice_no,
            'order_no' => $order_no,
            'opener_type' => $opener_type,
            'invoice_title' => $invoice_title,
            'type' => $type,
            'tax' => $tax,
            'bank' => $bank,
            'account' => $account,
            'address' => $address,
            'phone' => $phone,
            'status' => $invoice_status,
        ];
        $result = $this->validate($invoice_data,'Invoice');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        // 实例化模型
        $order = new OrderModel();
        $invoice = new Invoice();
        $contract = new Contract();
        $order_workplace = new OrderWorkplace();
        // 开启事务
        $order->startTrans();
        $invoice->startTrans();
        $contract->startTrans();
        $order_workplace->startTrans();

        try {
            $order->save($order_data);
            $invoice->save($invoice_data);
            // 插入订单工位中间表
            if (!empty($workplaces)) {
                $list = [];
                foreach ($workplaces as $value) {
                    $workplace_id = isset($value['workplace_id']) ? $value['workplace_id'] : '';
                    $workplace_area = isset($value['workplace_area']) ? $value['workplace_area'] : '';
                    $data = [
                        'order_id' => $order->id,
                        'workplace_id' => $workplace_id,
                        'workplace_area' => $workplace_area
                    ];
                    // 验证参数
                    $result = $this->validate($data, 'OrderWorkplace');
                    if (true !== $result) {
                        return json(['code' => 401, 'message' => $result]);
                    } else {
                        // 更新工位信息
                        $workplace = Workplace::get($workplace_id);
                        // 判断工位类型
                        if (empty($workplace->type)) {
                            // 更新工位的租赁团队
                            $workplace->enter_team_id = $team_id;
                        }
                        // 工位状态
                        $workplace->status = 1;
                        // 工位剩余面积
                        $residual_area = floatval($workplace->residual_area) - floatval($workplace_area);

                        if ($residual_area < 0) {
                            $workplace_no = $workplace->workplace_no;
                            return json(['code' => 404, 'message' => $workplace_no. '工位面积不足']);
                        }
                        $workplace->residual_area = $residual_area;

                        if(!$workplace->save()) {
                            return json(['code' => 404, 'message' => '工位状态更新失败']);
                        }
                    }
                    $list[] = $data;
                }
                $order_workplace->saveAll($list);
            }
            // 合同新增
            $months = $contract_years * 12;
            $failure_time = date("Y-m-d",strtotime("+$months month",strtotime($effective_time)));
            $data = [
                'contract_no' => 'CN' . uniqid(),
                'order_no' => $order_no,
                'contract_template_no' => $contract_template_no,
                'operator_id' => session('admin.id'),
                'custom_content' => $custom_content,
                'status' => -1,
                'effective_time' => $effective_time,
                'failure_time' => $failure_time,
            ];
            $result = $this->validate($data, 'Contract');
            if (true !== $result) {
                return json(['code' => 401, 'message' => $result]);
            }
            // 保存合同数据
            if (!$contract->save($data)) {
                return json(['code' => 404, 'message' => '合同保存失败']);
            }
            $order->commit();
            $invoice->commit();
            $order_workplace->commit();
            $contract->commit();
            return json(['code' => 200, 'message'=> '保存成功']);
        } catch (\Exception $e) {
            $order->rollback(); // 事务回滚
            $invoice->rollback();
            $order_workplace->rollback();
            $contract->rollback();
            return json(['code' => 404, 'message'=> '保存失败', 'data'=>$e->getMessage()]);
        }
    }

    /**
     * 订单详情
     */
    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'Order.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $order = OrderModel::where($data)
            ->with(['operator' => function ($query) {
                $query->field('id,nickname');
            }, 'team'])
            ->find();
        if (!empty($order)) {
            $order_workplaces = OrderWorkplace::where('order_id', $id)
                ->with(['workplace.space'])
                ->select();
            foreach ($order_workplaces as $order_workplace) {
                // 获取工位所属空间
                $space = $order_workplace->workplace->space;
                $space_data[] = $space;
            }

            $workplace_arr = [];
            foreach ($space_data as $key => $value) {
                $workplace_arr[$key]['space'] = $value->toArray();
                foreach ($order_workplaces as $order_workplace) {
                    $workplace = $order_workplace->workplace;
                    if ($workplace->space_id == $value->id) {
//                        dump($workplace->type);
                        if ($workplace->type == 1) {
                            $workplace_arr[$key]['space']['workplace']['workplace_no'] = $workplace->workplace_no;
                            $workplace_arr[$key]['space']['workplace']['price'] = $workplace->price;
                            $workplace_arr[$key]['space']['workplace']['area'] = $order_workplace->workplace_area;
                        } else {
                            $workplace_arr[$key]['space']['workplace']['workplace_no'] = $workplace->workplace_no;
                            $workplace_arr[$key]['space']['workplace']['price'] = $workplace->price;
//                            $workplace_arr[$key]['space']['workplace']['area'] = $order_workplace->workplace_area;
                        }
                    }
                }
            }
        }
        $detail = ['order' => $order, 'workplace' => $workplace_arr];

//        $detail = ['order' => $order, 'workplace' => $workplace_arr];
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
     * 流程进度
     *
     */
    public function progress()
    {
        $order_id = request()->param('id');
        $data = [];
        // 审核流程
        $run_log = ProcessDb::RunLog($order_id, 'order');

        return json(['data' => $run_log]);

    }

    /**
     * 查看订单(审核时）
     */
    public function view()
    {
        $info = db('tb_order')->find(input('id'));
        $this->assign('info', $info);
        return $this->fetch();
    }
}
