<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\WorkplaceGroup as WorkplaceGroupModel;

class WorkplaceGroup extends BaseController
{
    /**
     * 分组列表
     *
     */
    public function index()
    {
        $page = config('pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $name = request()->param('name');
        $id = request()->param('id');

        /* 验证 */
        $data = [
            'page_size' => $page_size,
            'jump_page' => $jump_page,
        ];

        $result = $this->validate($data, 'WorkplaceGroup.index');
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
        $group = WorkplaceGroupModel::where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);
        /* 返回数据 */
        return json(['code'    => 200, 'message' => '获取列表成功', 'data'    => $group]);
    }


    /**
     * 分组新建更新
     *
     */
    public function save()
    {
        // 获取客户端提供的参数
        $id          = request()->param('id');
        $name       = request()->param('name');
        // 验证参数
        $data = [
            'id'               => $id,
            'name'             => $name
        ];
        $result = $this->validate($data, 'WorkplaceGroup.save');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        if (empty($id)) {
            $company = new WorkplaceGroupModel;
            $result = $company->save($data);
        } else {
            // 更新
            $company = new WorkplaceGroupModel;
            $result = $company->save($data, ['id', $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
        }
    }

    /**
     * 分组详情
     *
     */
    public function detail()
    {
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'WorkplaceGroup.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = WorkplaceGroupModel::where('id', $id)->find();

        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
    }

    /**
     * 分组删除
     *
     */
    public function delete()
    {
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'WorkplaceGroup.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = WorkplaceGroupModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 分组下拉
     */
    public function select()
    {
        $group = WorkplaceGroupModel::field('id,name')->select();
        if (!empty($group)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $group]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }
    }
}
