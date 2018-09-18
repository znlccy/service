<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\IncidentalOrder as IncidentalOrderModel;

class IncidentalOrder extends BaseController
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
        $result = $this->validate($data, 'IncidentalOrder.index');
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
        if ($status || $status === 0) {
            $conditions[] = ['status', '=', $status];
        }
        $incidental = IncidentalOrderModel::where($conditions)
            ->order('create_time', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $incidental]);
//        $this->assign('list', $incidental);
//        return $this->fetch();
    }


    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        $id = request()->param('id');
        $project = request()->param('project');
        $pay_type = request()->param('pay_type');
        $teams = request()->param('teams/a');
        $status = request()->param('status', 0);
        $data = [
            'id' => $id,
            'project' => $project,
            'pay_type' => $pay_type,
            'teams' => $teams,
            'status' => $status
        ];
        $result = $this->validate($data, 'IncidentalOrder');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 插入杂费收款表
        foreach ($teams as $team) {
            $team['project'] = $project;
            $team['order_no'] = 'OR' . uniqid();
            $team['pay_type'] = $pay_type;
            $team['status'] = $status;
            $incidental = new IncidentalOrderModel();
            $result = $incidental->save($team);
            if ($result) {
                return json(['code' => 200, 'message' => '保存成功']);
            } else {
                return json(['code' => 404, 'message' => '保存失败']);
            }
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

    public function view()
    {

    }
}
