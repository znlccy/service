<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Order;
use app\admin\model\Incidental;
use think\Db;

class Work extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
                    $title = $order->team->company . '销售订单';
                    $status = $order->status;
                } else {
                    $incidental = Incidental::where('id', $item['from_id'])->find();
                    $title = $incidental->project . '杂费收取';
                    $status = $incidental->status;
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
                }
                // 审核状态
                switch ($status) {
                    case 0 :
                    case 1 :
                        $status = '等待审核(' . $user . ')';
                        break;
                    case 2 :
                        $status = '已通过';
                        break;
                    default :
                        $status = '已拒绝(' . $user . ')';
                        break;
                }
                $item['user'] = $admin->nickname;
                $item['title'] = $title;
                $item['status'] = $status;
                // 发起时间
                $item['create_time'] = date('Y-m-d H:i:s', $item['dateline']);
                // 备注
                $item['content'] = $remark;
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
        // 等待我去审核的数据

        // 获取审核通过和已拒绝的数据
        $data = [];
        $run_flow_log = db('tb_run_log')
            ->where('uid',$admin->id)
            ->where('btn', 'eq', 'ok')
            ->whereOr('btn', 'eq', 'Back')
            ->order('dateline', 'desc')
            ->field('from_id,from_table,dateline,content,btn')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item, $key) use ($space,$admin,&$data){
                if ($item['from_table'] == 'order') {
                    $order = Order::with('team')->where('id',$item['from_id'])->find();
                    $title = $order->team->company . '销售订单';
                    $status = $order->status;
                } else {
                    $incidental = Incidental::where('id', $item['from_id'])->find();
                    $title = $incidental->project . '杂费收取';
                    $status = $incidental->status;
                }
                // 审核状态
                switch ($item['btn']) {
                    case 'ok' :
                        $status = '已审核';
                        break;
                    case 'back' :
                        $status = '已拒绝';
                        break;
                    default :
                        $status = '';
                }

                $data[$key]['title'] = $title;
                $data[$key]['user'] = $admin->nickname;
                $data[$key]['status'] = $status;
                // 审核时间
                $data[$key]['check_time'] = date('Y-m-d H:i:s', $item['dateline']);
                $data[$key]['space'] = $space;
                $data[$key]['content'] = $item['content'];
            });
        return json(['code' => 200, 'message' => '获取信息成功', 'data' => $data]);
    }

    /**
     * 抄送我的
     *
     */
    public function copy()
    {

    }



}
