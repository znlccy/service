<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\OperationTeam as OperationTeamModel;
use app\admin\model\OperationTeamRole;
use app\admin\model\UserRole;
use app\admin\model\Admin;
use app\admin\model\Role;
use think\Db;
use app\admin\model\Space;
use app\admin\model\Department;

class OperationTeam extends BaseController
{
    /**
     * 运营团队列表
     *
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $id = request()->param('id');
        $name = request()->param('name');
        $leader_id = request()->param('leader_id');
        $status = request()->param('status');
        // 参数验证
        $data = [
            'id' => $id,
            'name' => $name,
            'leader_id' => $leader_id,
            'page_size' => $page_size,
            'jump_page' => $jump_page,
        ];
        $result = $this->validate($data, 'OperationTeam.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        // 组合过滤条件
        $conditions = [];
        if (!empty($id)) {
            $conditions[] = ['id', '=', $id];
        }
        if ($name) {
            $conditions[] = ['name', 'like', '%' . $name . '%'];
        }
        if ($leader_id) {
            $conditions[] = ['leader_id', '=', $leader_id];
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

        $teams = OperationTeamModel::where($conditions)
            ->with(['space' => function ($query) {
                $query->field("id,name,operation_team_id");
            },'leader' => function ($query) {
                $query->field("id,nickname");
            }])
            ->paginate($page_size, false, ['page' => $jump_page])->each(function ($item) {
                unset($item['leader_id']);
                return $item;
            });
        return json(['code' => 200, 'message' => '获取消息列表成功', 'data' => $teams]);

    }


    /**
     * 运营团队新增更新
     *
     */
    public function save()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        $name = request()->param('name');
        $leader_id = request()->param('leader_id/d', 0);
        $description = request()->param('description');
        $management_type = request()->param('management_type', 0);
        $status = request()->param('status', 1);
        // 验证参数
        $data = [
            'id'               => $id,
            'name'             => $name,
            'leader_id'        => $leader_id,
            'description'      => $description,
            'management_type'  => $management_type,
            'status'  => $status,
        ];

        $result = $this->validate($data, 'OperationTeam');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $team = new OperationTeamModel();
        $team->startTrans();
        try{
            if (empty($id)) {                    // 同时创建名字相同的部门
                $result = $team->save($data);
                $department = new Department();
                $department_data = [
                    'name' => $name,
                    'p_id' => 0,
                    'description' => $name,
                    'team_id' => $team->id
                ];
                $department->save($department_data);
            } else {
                $result = $team->save($data, ['id', $id]);
                // 同时更新部门信息
                $department = new Department();
                $department_data = [
                    'name' => $name,
                    'p_id' => 0,
                    'description' => $name,
                    'team_id' => $team->id
                ];
                $department->save($department_data,['operation_team_id' => $team->id]);
            }
            if ($result) {
                if (empty($id)) {
                    // 创建工作流
                    $flow_result = $this->addFlow($team->id);
                }
                $team->commit();
                return json(['code' => 200, 'message' => '保存成功!']);
            } else {
                return json(['code' => 404, 'message' => '保存失败!']);
            }
        } catch (\Exception $e) {
            $team->rollback();
            return json(['code' => 404, 'message'=> '保存失败', 'data'=>$e->getMessage()]);
        }

    }

    /**
     * 运营团队详情
     *
     */
    public function detail()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'OperationTeam.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = OperationTeamModel::where('id', $id)->with(['leader' => function($query){
            $query->field('id,nickname');
        }])->find();

        if ($detail) {
//            unset($detail->leader_id);
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
    }

    /**
     * 运营团队删除
     *
     */
    public function delete()
    {
        $id = request()->param('id');
        // 验证参数
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data, 'OperationTeam.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $team = OperationTeamModel::get($id, 'users');
        if (!empty($team)) {
            // 启动事务
//            Db::startTrans();
            $team->startTrans();
            try {
                // 删除用户角色中间表数据
                $user_ids= [];
                foreach ($team['users'] as $value) {
                    $user_ids[] = $value['id'];
                }
                $user_roles = UserRole::whereIn('user_id', $user_ids)->delete();
                // 删除运营团队的同时删除下面的所有用户
                $team->together('users')->delete();
                // 获取运营团队下的所有角色id
                $role_ids = OperationTeamRole::where('operation_team_id', $id)->column('role_id');
                // 删除运营团队的同时删除下面的所有自建角色
                $roles = Role::whereIn('id', $role_ids)->where('type', 1)->delete();
                $operation_team_roles = OperationTeamRole::where('operation_team_id', $id)->delete();
                // 删除同名部门
                Department::where('operation_team_id', $id)->delete();
                $team->commit();
                return json(['code' => 200, 'message' => '删除成功!']);
            } catch (\Exception $e) {
                // 回滚事务
                $team->rollback();
                return json(['code' => 404, 'message' => '删除失败!']);
            }
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }

    }


    /**
     * 运营团队删除用户
     */
    public function deleteUser()
    {
        $id = request()->param('id');
        $user_id = request()->param('user_id');
        // 验证参数
        $data = [
            'operation_team_id' => $id,
            'user_id' => $user_id
        ];

        $result = $this->validate($data, 'OperationTeam.deleteUser');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $user = User::where(['id' => $user_id, 'operation_team_id' => $id])->find();

        if (empty($user)) {
            return json(['code' => 401, 'message' => '该运营团队下不存在此用户']);
        } else {
            $result = User::where(['id' => $user_id, 'operation_team_id' => $id])->update(['operation_team_id' => '']);
            if ($result) {
                return json(['code' => 200, 'message' => '删除成功!']);
            } else {
                return json(['code' => 404, 'message' => '删除失败!']);
            }
        }
    }

    /**
     * 负责人下拉列表
     */
    public function leader()
    {
        $operation_team_id = request()->param('operation_team_id');
        $data = [
            'operation_team_id' => $operation_team_id
        ];
        $result = $this->validate($data, 'OperationTeam.leader');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        if (is_null($operation_team_id)) {
            $leaders = Admin::where('operation_team_id', '<>', 0)->field('id,nickname')->select();
        } else {
            $leaders = Admin::where('operation_team_id', $operation_team_id)->field('id,nickname')->select();
        }
        if (!empty($leaders)) {
            return json(['code' => 200, 'message' => '获取列表成功', 'data' => $leaders]);
        } else {
            return json(['code' => 404, 'message' => '获取列表失败']);
        }
    }

    /**
     * 运营团队删除角色
     */
    public function deleteRole()
    {
        $id = request()->param('id');
        $role_id = request()->param('$role_id');
        // 验证参数
        $data = [
            'operation_team_id' => $id,
            'role_id' => $role_id
        ];

        $result = $this->validate($data, 'OperationTeam.deleteRole');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        // 判断该运营团队下是否存在该用户
        $is_delete = OperationTeamRole::where($data)->find();

        if (empty($is_delete)) {
            return json(['code' => 401, 'message' => '该运营团队下不存在此角色']);
        }

        $result = OperationTeamRole::where($data)->delete();
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 运营团队下拉接口
     */
    public function select() {
        $team = OperationTeamModel::field('id,name')->where('status', '=', 1)->select()->toArray();
        array_unshift($team, ['id' => 0, 'name' => '公司']);
        if (!empty($team)) {
            return json(['code' => 200, 'message' => '获取列表成功', 'data' => $team]);
        } else {
            return json(['code' => 404, 'message' => '获取列表失败']);
        }
    }

    /**
     * 创建工作流
     */
    public function addFlow($team_id)
    {
        // 订单工作流数据
        $data = [
            ['team_id' => $team_id, 'type' => 'order', 'flow_name' => '销售订单审核流程', 'flow_desc' => '销售订单审核流程', 'uid' => session('admin.id'), 'add_time' => time()],
            ['team_id' => $team_id, 'type' => 'incidental', 'flow_name' => '杂费收取审核流程', 'flow_desc' => '销售订单审核流程', 'uid' => session('admin.id'), 'add_time' => time()]
        ];
        $result = Db::table('tb_flow')->insertAll($data);
        return $result;
    }

    /**
     * 工作流列表
     */
    public function flow_list()
    {
        $operation_team_id = request()->param('operation_team_id');
        /* 验证 */
        $data = [
            'id' => $operation_team_id,
        ];
        $result   = $this->validate($data, 'OperationTeam.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $data = [];
        // 管理模式
        $management_type = OperationTeamModel::where('id', $operation_team_id)->value('management_type');
        $data['management_type'] = $management_type;
        // 工作流编辑
        $flow = Db::table('tb_flow')->where('team_id', $operation_team_id)->field('id,flow_name,status')->paginate('10');
        $data['flow'] = $flow->each(function($item, $key){
            $item['is_edit'] = db('tb_run')->where('flow_id',$item['id'])->where('status','0')->value('id');
            if ($item['is_edit']) {
                $item['is_edit'] = 1;
            } else {
                $item['is_edit'] = 0;
            }
            return $item;
        });
//        $this->assign('list', $data);
//        return $this->fetch('flowdesign/lists');
        return json(['code' => 200, 'message' => '获取列表成功', 'data' => $data]);

    }

    /**
     * 流程编辑
     */
    public function flow_design()
    {

        $flow_id = request()->param('flow_id');
        if($flow_id<=0){
            return json(['code' => 401, 'message' => '参数有误']);
        }
        $one = db('tb_flow')->find($flow_id);
        if(!$one){
            return json(['code' => 404, 'message' => '未找到数据，请重试!']);
        }
        $list = db('tb_flow_process')->where('flow_id',$flow_id)->order('id asc')->select();
        $process_data = [];
        $process_total = 0;
        foreach($list as $value)
        {
            $process_total +=1;
            $style = json_decode($value['style'],true);
            $process_data[] = array(
                'id'=>$value['id'],
                'flow_id'=>$value['flow_id'],
                'process_name'=>$value['process_name'],
                'process_to'=>$value['process_to'],
                'icon'=>$style['icon'],//图标
                'style'=>'width:'.$style['width'].'px;height:'.$style['height'].'px;line-height:'.$style['height'].'px;color:'.$style['color'].';left:'.$value['setleft'].'px;top:'.$value['settop'].'px;',
            );
        }
        $this->assign('one', $one);

        $this->assign('process_data', json_encode(array('total'=>$process_total,'list'=>$process_data)));
        return $this->fetch('flowdesign/index', ['flow_id' => $flow_id]);
    }
}
