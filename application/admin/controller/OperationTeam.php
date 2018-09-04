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

class OperationTeam extends Controller
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
        $status = request()->param('status/d');
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
        if ($status) {
            $conditions[] = ['status', '=', $status];
        }

        $teams = OperationTeamModel::where($conditions)
            ->with(['space' => function ($query) {
                $query->field("id,name");
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
        $leader_id = request()->param('leader_id');
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
            'status'           => $status,
        ];

        $result = $this->validate($data, 'OperationTeam');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        if (empty($id)) {
            $team = new OperationTeamModel();
            $result = $team->save($data);
        } else {
            // 更新
            if (empty($logo)) {
                unset($data['logo']);
            }
            $team = new OperationTeamModel();
            $result = $team->save($data, ['id', $id]);
        }
        if ($result) {
            // 同时更新负责人所属团队
            $user = User::where('id', $leader_id)->update(['operation_team_id' => $team->id]);
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
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
        $detail = OperationTeamModel::where('id', $id)->find();

        if ($detail) {
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
            Db::startTrans();
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
                Db::commit();
                return json(['code' => 200, 'message' => '删除成功!']);
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
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
        $leaders = Admin::field('id,nickname')->select();
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
        $team = OperationTeamModel::field('id,name')->select();
        if (!empty($team)) {
            return json(['code' => 200, 'message' => '获取列表成功', 'data' => $team]);
        } else {
            return json(['code' => 404, 'message' => '获取列表失败']);
        }
    }
}
