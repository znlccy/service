<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Invoice as InvoiceModel;

class Invoice extends Controller
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
        $result = $this->validate($data, 'Invoice.index');
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
        if (is_null($status)) {
            $conditions[] = ['status', 'in',[0,1]];
        } else {
            switch ($status) {
                case 0:
                    $conditions[] = ['status', '=', $status];
                    break;
                case 1:
                    $conditions[] = ['status', '=', $status];
                    break;
                default:
                    break;
            }
        }
        $invoice = InvoiceModel::where($conditions)
            ->with(['opener'])
            ->where('order_type', '<>', 0)
            ->order('create_time', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page])->each(function($item){
                $item['order_no'] = $item['rec_order_id'];
                unset($item['sale_order_id'], $item['rec_order_id']);
                return $item;
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $invoice]);
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
     * 发票详情
     *
     */
    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'Invoice.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = InvoiceModel::where('id',$id)->find();
        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功', 'data' => $detail]);
        } else {
            return json(['code' => 401, 'message' => '获取详情失败']);
        }
    }

    /**
     * 开票状态
     *
     */
    public function open()
    {
        $id = request()->param('id');
        $user_id = session('admin.id');
        $data = [
            'id' => $id,
            'status' => 1,
            'opener_id' => $user_id,
            'open_time' => date('Y-m-d H:i:s', time())
        ];
        $result = $this->validate($data, 'Invoice.open');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = InvoiceModel::update($data);
        if ($result) {
            return json(['code' => 200, 'message' => '开票成功']);
        } else {
            return json(['code' => 404, 'message' => '开票失败']);
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
}
