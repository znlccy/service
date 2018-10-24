<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/10 0010
 * Time: 下午 3:53
 */

namespace app\index\controller;

use app\index\model\RecOrder;
use app\index\model\IncidentalOrder;
use app\index\model\Invoice;
use think\Controller;
use think\Db;

class Pay extends Controller
{
    public function index()
    {
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
//        $rec_order = RecOrder::field('id,order_no,status')
//            ->paginate($page_size, false, ['page' => $jump_page])
//            ->each(function($item) {
//                return $item;
//            });
//        $inc_order = IncidentalOrder::field('id,order_no,status')
//            ->paginate($page_size, false, ['page' => $jump_page])
//            ->each(function($item) {
//                return $item;
//            });
        // 对于UNION查询以及一些特殊的复杂查询，推荐使用这种方式首先单独查询总记录数，然后再传入分页方法
        $rec_order_count = Db::table('tb_rec_order')->count();
        $inc_order_count = Db::table('tb_incidental_order')->count();
        $total_count = intval($rec_order_count + $inc_order_count);
        $order = Db::field('order_no,status,create_time')
            ->table('tb_rec_order')
            ->union(function($query) {
                $query->field('order_no,status,create_time')->table('tb_incidental_order');
            })->order('status,create_time')
            ->paginate($page_size, $total_count, ['page' => $jump_page])
            ->each(function($item){
                // 判断是订单类型
                $order_type = mb_substr($item['order_no'],0,2);
                if ($order_type === 'XS') {
                    $item['description'] = '租赁订单缴费';
                } elseif($order_type === 'ZF') {
                    $item['description'] = IncidentalOrder::where('order_no', $item['order_no'])->value('project');
                } else {
                    $item['description'] = '';
                }
                return $item;
            });
//
//$rec_order = json_encode($rec_order);
//$rec_order = json_decode($rec_order);
//var_dump($rec_order->total);die;
        return json(['data' => $order]);
    }
}