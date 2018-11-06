<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Space as SpaceModel;

class Space extends BasisController
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
        $name = request()->param('name');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'name'             => $name,
            'id'               => $id,
        ];
        $result = $this->validate($data, 'Space.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($name) {
            $conditions[] = ['name', 'like', '%' . $name . '%'];
        }
        $space = SpaceModel::where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item){
                unset($item['operation_team_id']);
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $space]);
    }

    /**
     * 空间下拉列表
     */
    public function select()
    {
        $space = SpaceModel::field('id,name,short_description,description')->select();
        if (!empty($space)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $space]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }
    }
}
