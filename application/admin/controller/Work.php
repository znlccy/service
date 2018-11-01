<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Order;
use app\admin\model\Incidental;
use think\Db;
use app\admin\model\OrderCopy;
use app\admin\model\UserRole;
use app\admin\model\Admin;
use app\admin\model\Space;
use app\admin\model\Workplace;
use app\admin\model\OrderWorkplace;

class Work extends BaseController
{
    /**
     * 工作概览
     *
     */
    public function index()
    {
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        // 获取当前用户信息
        $admin = session('admin');
        $role_ids = UserRole::where('user_id', $admin['id'])->column('role_id');
        $operation_team_id = session('admin.operation_team_id');
        if ($operation_team_id) {
            $space = db('tb_space')->where('operation_team_id', $operation_team_id)->value('name');
        } else {
            $space = '';
        }
        $admin_info = Admin::with(['department', 'space'])->where('id', $admin['id'])->field('id,nickname,department_id,operation_team_id')->find();
        // 需要我进行的审核
        $data = [];
        $check_data = [];
        $check = db('tb_run_process')
            ->alias('p')
            ->where('p.status', '=', 0)
            ->leftJoin('tb_run r', 'p.run_id = r.id')
            ->field('p.*,r.from_table,r.from_id')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item) use ($admin, $role_ids, $data, &$check_data) {
                // 判断当前用户是否有审核权限
                $sponsor_ids = explode(',', $item['sponsor_ids']);
                if (($item['auto_person'] === 4 && in_array($admin['id'], $sponsor_ids)) || ($item['auto_person'] === 5 && array_intersect($role_ids,$sponsor_ids)) || ($item['auto_person'] === 6 && in_array($admin['department_id'], $sponsor_ids))) {
                    if ($item['from_table'] == 'order') {
                        $order = Order::with('team')->where('id',$item['from_id'])->find();
                        if ($order) {
                            $title = $order->team->company . '销售订单';
                            $type = 1;
                            $status = 0;
                        }
                    } else {
                        $incidental = Incidental::where('id', $item['from_id'])->find();
                        if ($incidental) {
                            $title = $incidental->project . '杂费收取';
                            $type = 2;
                            $status = 0;
                        }
                    }
                }
                if (isset($order) || isset($incidental)) {
                    $data['id'] = $item['from_id'];
                    $data['title'] = $title;
                    $data['type'] = $type;
                    $data['status'] = $status;
                    // 发起时间
                    $data['create_time'] = date('Y-m-d H:i:s', $item['dateline']);
                }
                if (!empty($data)) {
                    $check_data[] = $data;
                    return $check_data;
                } else {
                    unset($data, $item);
                }
            });
        // 抄送我的
        $copy_data = [];
        $copys = OrderCopy::where('user_id', $admin['id'])->with(['order.team'])
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item) use (&$copy_data) {
                $item['id'] = $item->order->id;
                $item['title'] = $item->order->team->company . '销售订单';
                $run = db('tb_run')
                    ->alias('r')
                    ->join('tb_admin a', 'r.uid = a.id')
                    ->where(['from_table' => 'order', 'from_id' =>$item->order->id])
                    ->field('r.id,r.from_table,r.from_id,r.dateline,r.uid,a.nickname,r.status,r.flow_id')
                    ->find();
                if ($run) {
                    $item['user'] = $run['nickname'];
                    switch ($item->order->status) {
                        case 1:
                            $item['status'] = 0;
                            break;
                        case 2:
                            $item['status'] = 1;
                            break;
                        case -1:
                            $item['status'] = -1;
                            break;
                        default :
                            $item['status'] = 0;
                            break;
                    }
                    if ($run['status'] === 0) {
                        $sponsor_text = db('tb_run_process')->where(['run_id' => $run['id'], 'status' => 0, 'run_flow' => $run['flow_id']])->value('sponsor_text');
                    } else {
                        $run_process = db('tb_run_process')->where(['run_id' => $run['id'], 'status' => 2, 'run_flow' => $run['flow_id']])->field('sponsor_text,remark')->find();
                        $sponsor_text = $run_process['sponsor_text'];
                        $remark = $run_process['remark'];
                    }
                    // 操作人
                    if (isset($sponsor_text)) {
                        $item['sponsor_text'] = $sponsor_text;
                    }
                    // 理由
                    if (isset($remark)) {
                        $item['remark'] = $remark;
                    }
                    // 发起时间
                    $item['create_time'] = date('Y-m-d H:i:s', $run['dateline']);
                    unset($item['order']);
                    unset($item['update_time']);
                    $copy_data[] = $item;
                }
            });
        // 空间入驻率
        $spaces = Space::field('id,name')->select();
        $space_data = [];

        foreach ($spaces as $space) {
            $rate = $this->rate($space->id);
            $space['enter_rate'] = $rate;
            $space_data[] = $space;
        }
        /* 销售额start*/
        // 获取已经完成的订单
        $order_ids = Order::where('status', '=', 2)->column('id');
        $order_workplaces = OrderWorkplace::whereIn('order_id', $order_ids)->field('order_id,workplace_id')->select();

        // 空间
//        $spaces = Space::field('id,name')->select();
        $orders = [];
        foreach ($spaces as $key => $space) {
            foreach ($order_workplaces as $order_workplace) {
                $space_id = Workplace::where('id', $order_workplace['workplace_id'])->value('space_id');
                if ($space['id'] === $space_id) {
                    $orders[] = $order_workplace['order_id'];
                }

            }
            $orders = array_unique($orders);
            $spaces[$key]['sale_price'] = Order::whereIn('id', $orders)->sum('total_price');
        }
        /*销售额end*/


        return json(['code' => 200, 'data' => ['check_data' => $check_data, 'copy_data' => $copy_data, 'space_data' => $space_data]]);
    }

    /**
     * 我发起的审核
     *
     */
    public function launch()
    {
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        // 获取当前用户信息
        $admin = session('admin');
        $operation_team = session('admin.operation_team_id');
        if ($operation_team) {
            $space = db('tb_space')->where('operation_team_id', $operation_team)->value('name');
        } else {
            $space = '';
        }
        $run_flow = db('tb_run')
            ->where('uid',$admin->id)
            ->field('id,from_table,from_id,uid,status,run_flow_process,dateline')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item,$key) use ($space,$admin){
                if ($item['from_table'] == 'order') {
                    $order = Order::with('team')->where('id',$item['from_id'])->find();
                    if ($order) {
                        $id = $order->id;
                        $title = $order->team->company . '销售订单';
                        $type = 1;
                        $status = $order->status;
                    }
                } else {
                    $incidental = Incidental::where('id', $item['from_id'])->find();
                    if ($incidental) {
                        $id = $incidental->id;
                        $title = $incidental->project . '杂费收取';
                        $type = 2;
                        $status = $incidental->status;
                    }
                }
                // 备注(审核意见)
                $remark = Db::name('tb_run_process')->where('run_flow_process', $item['run_flow_process'])->where('status','eq', 2)->value('remark');
                if ($item['status'] == 0 || $status == -1) {
                    $process = Db::name('tb_flow_process')->where('id','eq',$item['run_flow_process'])->find();
                    if($process['auto_person'] == 4){
                        $user =$process['auto_sponsor_text'];
                    }elseif($process['auto_person'] == 5){
                        $user =$process['auto_role_text'];
                    }elseif($process['auto_person'] == 6){
                        $user =$process['auto_dept_text'];
                    }
                    $item['sponsor_text'] = $user;
                }
                // 审核状态
                switch ($status) {
                    case 1:
                        $item['status'] = 0;
                        break;
                    case 2:
                        $item['status'] = 1;
                        break;
                    case -1:
                        $item['status'] = 2;
                        break;
                    default :
                        break;
                }
                $item['id'] = $id;
                $item['type'] = $type;
                $item['user'] = $admin->nickname;
                $item['title'] = $title;
                // 发起时间
                $item['create_time'] = date('Y-m-d H:i:s', $item['dateline']);
                // 备注
                if ($remark) {
                    $item['remark'] = $remark;
                }
                $item['space'] = $space;
                unset($item['from_table'],$item['from_id'],$item['run_flow_process'],$item['dateline'],$item['uid']);
                return $item;
            });
        return json(['code' => 200, 'message' => '获取信息成功', 'data' => $run_flow]);
    }

    /**
     * 我的审核
     *
     */
    public function examine()
    {
        $page = config('page.pagination');
//        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $page_size = 20;
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        // 获取当前用户信息
        $user_id = session('admin.id');
        $role_ids = UserRole::where('user_id', $user_id)->column('role_id');
        $operation_team_id = session('admin.operation_team_id');
        $department_id = session('admin.department_id');
        if ($operation_team_id) {
            $space = db('tb_space')->where('operation_team_id', $operation_team_id)->value('name');
        } else {
            $space = '';
        }

        /* start */
        $no_checks = db('tb_run_process')
            ->where(['status' => 0])
            ->field('id,auto_person,sponsor_ids')
            ->select();
        $no_check_ids = [];
        foreach ($no_checks as $no_check) {
            $sponsor_ids = explode(',', $no_check['sponsor_ids']);
            switch ($no_check['auto_person']){
                case 4;
                    if (in_array($user_id, $sponsor_ids)) {
                        $no_check_ids[] = $no_check['id'];
                    }
                    break;
                case 5;
                    if (array_intersect($sponsor_ids,$role_ids)) {
                        $no_check_ids[] = $no_check['id'];
                    }
                    break;
                case 6;
                    if (in_array($department_id, $sponsor_ids)) {
                        $no_check_ids[] = $no_check['id'];
                    }
                    break;
            }
        }
        $check_data = Db::field('status,run_id,remark as content')
            ->table('tb_run_process')
            ->whereIn('id', $no_check_ids)
            ->union(function ($query) {
                $query->field('status,run_id,content')->table('tb_run_log')->where('status', '<>', 0);
            })->select();
        $run_ids = [];
        $run_ids = array_column($check_data, 'run_id');
        $run = db('tb_run')
            ->alias('r')
            ->whereIn('r.id', $run_ids)
            ->leftJoin('tb_admin a', 'r.uid = a.id')
            ->order('r.status')
            ->field('r.id,r.uid,r.from_table,r.from_id,r.dateline,a.nickname')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function ($item) use ($check_data, $space) {
                if ($item['from_table'] == 'order') {
                    $order = Order::with('team')->where('id',$item['from_id'])->find();
                    if ($order) {
                        $title = $order->team->company . '销售订单';
                        $order_type = 1;
                    }
                } else {
                    $incidental = Incidental::where('id', $item['from_id'])->find();
                    if ($incidental) {
                        $title = $incidental->project . '杂费收取';
                        $order_type = 2;
                    }
                }
                $item['title'] = $title;
                $item['create_time'] = date('Y-m-d H:i:s', $item['dateline']);
                $item['space'] = $space;
                $item['order_type'] = $order_type;
                foreach ($check_data as $value) {
                    if ($item['id'] === $value['run_id']){
                        $item['status'] = $value['status'];
                        $item['content'] = $value['content'];
                    }
                }
                unset($item['uid'],$item['from_table'],$item['dateline']);
                return $item;
            });
        /* end */
        return json(['code' => 200, 'message' => '获取信息成功', 'data' => $run]);
    }

    /**
     * 抄送我的
     *
     */
    public function copy()
    {
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        // 获取当前用户信息
        $admin = session('admin');
        $operation_team_id = session('admin.operation_team_id');
        if ($operation_team_id) {
            $space = db('tb_space')->where('operation_team_id', $operation_team_id)->value('name');
        } else {
            $space = '';
        }
        $copys = OrderCopy::where('user_id', $admin['id'])->with(['order.team'])
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item){
                $item['id'] = $item->order->id;
                $item['title'] = $item->order->team->company . '销售订单';
                $run = db('tb_run')
                    ->alias('r')
                    ->join('tb_admin a', 'r.uid = a.id')
                    ->where(['from_table' => 'order', 'from_id' =>$item->order->id])
                    ->field('r.id,r.from_table,r.from_id,r.dateline,r.uid,a.nickname,r.status,r.flow_id')
                    ->find();
                if ($run) {
                    $item['user'] = $run['nickname'];
                    switch ($item->order->status) {
                        case 1:
                            $item['status'] = 0;
                            break;
                        case 2:
                            $item['status'] = 1;
                            break;
                        case -1:
                            $item['status'] = -1;
                            break;
                        default :
                            $item['status'] = 0;
                            break;
                    }
                    if ($run['status'] === 0) {
                        $sponsor_text = db('tb_run_process')->where(['run_id' => $run['id'], 'status' => 0, 'run_flow' => $run['flow_id']])->value('sponsor_text');
                    } else {
                        $run_process = db('tb_run_process')->where(['run_id' => $run['id'], 'status' => 2, 'run_flow' => $run['flow_id']])->field('sponsor_text,remark')->find();
                        $sponsor_text = $run_process['sponsor_text'];
                        $remark = $run_process['remark'];
                    }
                    // 操作人
                    if (isset($sponsor_text)) {
                        $item['sponsor_text'] = $sponsor_text;
                    }
                    // 理由
                    if (isset($remark)) {
                        $item['remark'] = $remark;
                    }
                    // 发起时间
                    $item['create_time'] = date('Y-m-d H:i:s', $run['dateline']);
                    unset($item['order']);
                    unset($item['update_time']);
                }
            });
        return json(['code' => 200, 'message' => '获取信息成功', 'data' => $copys]);
    }

    /**
     * 计算空间入驻率
     *
     */
    public function rate($id)
    {
        // 计算按个工位入驻率
        $one_sum_count = Workplace::where(['space_id' => $id, 'type' => 0])->count();
        if ($one_sum_count) {
            $one_lease_count = Workplace::where(['space_id' => $id, 'type' => 0, 'status' => 0])->count();
            $one_rate = bcdiv($one_lease_count, $one_sum_count, 2);
        }
        // 计算按面积工位入驻率
        $area_sum = Workplace::where(['space_id' => $id, 'type' => 1])->sum('total_area');
        if ($area_sum) {
            // 获取该空间下的所有按面积计算工位id
            $area_workplace_ids = Workplace::where(['space_id' => $id, 'type' => 1])->column('id');
            $area_lease_sum = OrderWorkplace::whereIn('workplace_id', $area_workplace_ids)->sum('workplace_area');
            $area_rate = bcdiv($area_lease_sum, $area_sum, 2);
        }
        if (isset($one_rate) && isset($area_rate)) {
            $rate = bcdiv($one_rate + $area_rate, 2, 2);
        } elseif(isset($one_rate)) {
            $rate = $one_rate;
        } elseif(isset($area_rate)) {
            $rate = $area_rate;
        } else {
            $rate = 0;
        }
        // 最终入驻率
        return $rate;
    }


}
