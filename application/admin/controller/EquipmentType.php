<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\EquipmentType as EquipmentTypeModel;

class EquipmentType extends BaseController
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
        $result = $this->validate($data, 'EquipmentType.index');
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
        $type = EquipmentTypeModel::where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $type]);
    }


    /**
     * 设备类型新增更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $name = request()->param('name');
        // 验证
        $data = [
          'id' => $id,
          'name' => $name
        ];
        $result = $this->validate($data, 'EquipmentType');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $type = new EquipmentTypeModel();
        if (empty($id)) {
            $result = $type->save($data);
        } else {
            $result = $type->save($data, ['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }
    }

    /**
     * 类型详情
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

        $result   = $this->validate($data, 'EquipmentType.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = EquipmentTypeModel::where('id', $id)->find();

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
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'EquipmentType.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = EquipmentTypeModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 类型下拉列表
     */
    public function select()
    {
        $type = EquipmentTypeModel::field('id,name')->select();
        if (!empty($type)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $type]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }
    }
}
