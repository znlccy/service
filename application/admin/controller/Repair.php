<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Repair as RepairModel;

class Repair extends Controller
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
        $equipment_no = request()->param('equipment_no');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'equipment_no'     => $equipment_no,
            'id'               => $id,
        ];
        $result = $this->validate($data, 'Repair.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($equipment_no) {
            $conditions[] = ['equipment_no', 'like', '%' . $equipment_no . '%'];
        }
        $repair = RepairModel::where($conditions)
            ->order('status')
            ->order('create_time', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $repair]);
    }


    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $description = request()->param('description');
        $equipment_no = request()->param('equipment_no');
        $repair_man = request()->param('repair_man');
        $mobile = request()->param('mobile');
        $status = request()->param('status', 0);

        // 验证
        $data = [
            'id' => $id,
            'description' => $description,
            'equipment_no' => $equipment_no,
            'repair_man' => $repair_man,
            'mobile' => $mobile,
            'status' => $status
        ];
        $result = $this->validate($data, 'Repair');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $repair = new RepairModel();
        if (empty($id)) {
            $result = $repair->save($data);
        } else {
            $result = $repair->save($data, ['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }
    }

    /**
     * 维修详情
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

        $result   = $this->validate($data, 'Repair.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = RepairModel::where('id', $id)->find();

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
        $result   = $this->validate($data, 'Repair.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = RepairModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }
}
