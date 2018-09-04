<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\OtRole as OtRoleModel;

class OtRole extends Controller
{
    /**
     * 角色列表
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
        $type = request()->param('type');
        // 参数验证
        $data = [
            'id' => $id,
            'page_size' => $page_size,
            'jump_page' => $jump_page,
        ];
        $result = $this->validate($data, 'OtRole.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤条件
        $conditions = [];
        if (!empty($id)) {
            $conditions['id'] = $id;
        }
        if (!empty($role_id)) {
            $conditions['role_id'] = $role_id;
        }
        if (!empty($name)) {
            $conditions['name'] = ['like', '%' . $name . '%'];
        }
        if (!empty($type)) {
            $conditions['type'] = $type;
        }
        $roles = OtRoleModel::where($conditions)
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code' => 200, 'message' => '获取消息列表成功', 'data' => $roles]);


    }


    /**
     * 角色新增更新
     *
     */
    public function save()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        $name = request()->param('name');
        $description = request()->param('description');
        $type = request()->param('type', 0);

        // 验证
        $data = [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'type' => $type,
        ];
        $result = $this->validate($data, 'OtRole.save');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        if (empty($id)) {
            $role = new OtRoleModel();
            $result = $role->save($data);
        } else {
            $role = new OtRoleModel();
            $result = $role->save($data, ['id', $id]);
        }
        if ($result) {
            $data = ['code' => 200, 'message' => '保存成功!'];
            return json($data);
        } else {
            $data = ['code' => 404, 'message' => '保存失败!'];
            return json($data);
        }
    }

    /**
     * 角色详情
     *
     */
    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'OtRole.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $detail = OtRoleModel::where($data)->find();
        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }

    }


    /**
     * 角色删除
     *
     */
    public function delete()
    {
        // 获取参数
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
        ];
        $result = $this->validate($data,'OtRole.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $result = OtRoleModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }
}
