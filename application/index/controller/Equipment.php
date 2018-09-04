<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\admin\model\Equipment as EquipmentModel;

class Equipment extends Controller
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
        $type_id = request()->param('type_id');
        $space_id = request()->param('space_id');
        $status = request()->param('status');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'name'             => $name,
            'id'               => $id,
            'type_id'          => $type_id,
            'space_id'         => $space_id,
            'status'           => $status,
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
        if ($type_id) {
            $conditions[] = ['type_id', '=', $type_id];
        }
        if ($space_id) {
            $conditions[] = ['space_id', '=', $space_id];
        }
        if ($type_id) {
            $conditions[] = ['type_id', '=', $type_id];
        }
        if ($status) {
            $conditions[] = ['status', '=', $status];
        }
        $type = EquipmentModel::with(['type' => function($query) {
            $query->field('id,name');
        }, 'space' => function($query) {
            $query->field('id,name');
        }])->where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $type]);
    }


    /**
     * 设备新增更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $equipment_no = request()->param('equipment_no');
        $name = request()->param('name');
        $type_id = request()->param('type_id');
        $space_id = request()->param('space_id');
        $status = request()->param('status', 1);
        // 验证
        $data = [
            'id' => $id,
            'name' => $name,
            'equipment_no' => $equipment_no,
            'type_id' => $type_id,
            'space_id' => $space_id,
            'status' => $status
        ];
        $result = $this->validate($data, 'Equipment');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $equipment = new EquipmentModel();
        if (empty($id)) {
            $result = $equipment->save($data);
        } else {
            $result = $equipment->save($data, ['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }
    }

    /**
     * 设备详情
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

        $result   = $this->validate($data, 'Equipment.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = EquipmentModel::with(['type' => function($query) {
            $query->field('id,name');
        }, 'space' => function($query) {
            $query->field('id,name');
        }])->where('id', $id)->find();

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
        $result   = $this->validate($data, 'Equipment.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = EquipmentModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 设备下拉列表
     */
    public function select()
    {
        $equipment = EquipmentModel::Field('equipment_no,name')->select();
        if ($equipment) {
            return json(['code' => 200, 'message' => '获取列表成功', 'data' => $equipment]);
        } else {
            return json(['code' => 404, 'message' => '获取列表失败']);
        }
    }
}
