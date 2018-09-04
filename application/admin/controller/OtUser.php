<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\OtUser as OtUserModel;

class OtUser extends Controller
{
    /**
     * 用户列表
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
        $role_id = request()->param('role_id');
        // 参数验证
        $data = [
            'id' => $id,
            'role_id' => $role_id,
            'page_size' => $page_size,
            'jump_page' => $jump_page,
        ];
        $result = $this->validate($data, 'OtUser.index');
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
        $users = OtUserModel::where($conditions)->with(['role' => function ($query) {
            $query->field('id,name');
        }])->paginate($page_size, false, ['page' => $jump_page])->each(function($item) {
            unset($item['role_id']);
            return $item;
        });
        return json(['code' => 200, 'message' => '获取消息列表成功', 'data' => $users]);


    }


    /**
     * 用户新建更新
     *
     */
    public function save()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        $name = request()->param('name');
        $mobile = request()->param('mobile');
        $email = request()->param('email');
        $role_id = request()->param('role_id');

        // 验证
        $data = [
            'id' => $id,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'role_id' => $role_id,
        ];
        $result = $this->validate($data, 'OtUser.save');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        if (empty($id)) {
            $user = new OtUserModel();
            $result = $user->save($data);
        } else {
            // 更新
            $user = new OtUserModel();
            $result = $user->save($data, ['id', $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
        }
    }

    /**
     * 用户详情
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
        $result = $this->validate($data,'OtUser.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $detail = OtUserModel::where($data)->find();
        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }

    }

    /**
     * 删除指定资源
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
        $result = $this->validate($data,'OtUser.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $result = OtUserModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }
}
