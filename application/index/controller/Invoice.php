<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Invoice as InvoiceModel;

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
         $invoice_no = 'IN' .uniqid();
         $opener_type = request()->param('opener_type');
         // 发票抬头是当前公司
         $invoice_title = request()->param('invoice_title');
         $type = request()->param('type');
         $tax = request()->param('tax');
         $bank = request()->param('bank');
         $account = request()->param('account');
         $order_type = 0;
         $address = request()->param('address');
         $phone = request()->param('phone');
         $status = request()->param('status', 0);
         $price = 0;
         // 当前用户所属团队
         $team_id = request()->param('team_id', 0);
         $data = [
             'invoice_no' => $invoice_no,
             'opener_type' => $opener_type,
             'invoice_title' => $invoice_title,
             'type' => $type,
             'tax' => $tax,
             'bank' => $bank,
             'account' => $account,
             'order_type' => $order_type,
             'address' => $address,
             'phone' => $phone,
             'status' => $status,
             'price' => $price,
             'team_id' => $team_id
         ];
         $result = $this->validate($data, 'Invoice.save');
         if (true != $result) {
             return json(['code' => 401, 'message' => $result]);
         }
         $invoice = new InvoiceModel();
         $result = $invoice->save($data);
         if ($result) {
             return json(['code' => 200, 'message' => '设置成功']);
         } else {
             return json(['code' => 404, 'message' => '保存失败']);
         }

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
     * 删除指定资源
     *
     */
    public function delete()
    {
        //
    }
}
