<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\ChargeRecord;
use app\index\model\RecOrder;
use app\index\model\IncidentalOrder;
use app\admin\model\EnterTeam;
use think\Db;

class Charge extends BaseController
{
    /**
     * 费用明细
     *
     */
    public function index()
    {
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        // 对于UNION查询以及一些特殊的复杂查询，推荐使用这种方式首先单独查询总记录数，然后再传入分页方法
        $rec_order_count = Db::table('tb_rec_order')->where('team_id')->count();
        $inc_order_count = Db::table('tb_incidental_order')->where('team_id')->count();
        $total_count = intval($rec_order_count + $inc_order_count);
        $order = Db::field('order_no,status,team_id,price,create_time')
            ->table('tb_rec_order')
            ->union(function($query){
                $query->field('order_no,status,team_id,price,create_time')->table('tb_incidental_order');
            })->order('status,create_time')
            ->paginate($page_size, $total_count, ['page' => $jump_page])
            ->each(function($item){
                $item['company'] = EnterTeam::where('id', $item['team_id'])->value('company');
                // 判断是订单类型
                $order_type = mb_substr($item['order_no'],0,2);
                if ($order_type === 'XS') {
                    $item['name'] = '租赁订单缴费';
                } elseif($order_type === 'ZF') {
                    $item['name'] = IncidentalOrder::where('order_no', $item['order_no'])->value('project');
                } else {
                    $item['name'] = '';
                }
                return $item;
            });

        return json(['code' =>200, 'data' => $order]);
    }

    /**
     * 收款记录
     */
    public function record()
    {
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $order_no = request()->param('order_no');
        $conditions = [];
        if ($order_no) {
            $conditions[] = ['order_no' => $order_no];
        }
        $record = ChargeRecord::where($conditions)->where('status', '=', 1)->with(['operator'])->paginate($page_size, false, ['page' => $jump_page]);

        return json(['code' => 200, 'message' => '获取列表成功', 'data' => $record]);

    }


}
