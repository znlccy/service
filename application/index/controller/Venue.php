<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Venue as VenueModel;
use app\index\model\Reservation;

class Venue extends BasisController
{
    /**
     * 场馆列表
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
        $result = $this->validate($data, 'Venue.index');
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
        $venue = VenueModel::with(['space' => function($query) {
            $query->field('id,name');
        }])->where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $venue]);
    }


    /**
     * 场馆新增更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $venue_no = request()->param('venue_no');
        $name = request()->param('name');
        $space_id = request()->param('space_id');
        $accommodate_num = request()->param('accommodate_num/d', 0);
        $remark = request()->param('remark');
        $disable_time = request()->param('disable_time');
        $status = request()->param('status/d');
        $data = [
            'id' => $id,
            'venue_no' => $venue_no,
            'name' => $name,
            'space_id' => $space_id,
            'accommodate_num' => $accommodate_num,
            'remark' => $remark,
            'disable_time' =>$disable_time,
            'status' => $status,
        ];
        // 验证
        $result = $this->validate($data, 'Venue');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $venue = new VenueModel();
        if (empty($id)) {
            $result = $venue->save($data);
        } else {
            $result = $venue->save($data,['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }
    }

    /**
     * 场馆详情
     *
     */
    public function detail()
    {
        // 获取前端传的参数
        $id = request()->param('id');
        $date = request()->param('date', date('Y-m-d', time()));
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'Venue.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = VenueModel::with(['space' => function ($query) {
            $query->field('id,name');
        }])->where('id', $id)->find();

        $is_res_time = Reservation::where(['venue_id' => $id, 'date' => $date])->where('status', '<>', 2)->column('reservation_time');
        $data = [];
        foreach ($is_res_time as $value) {
            $data = array_unique(array_merge($data, json_decode($value, true)));
        }

        $detail['is_res_time'] =  $data;

        if ($detail) {
            unset($detail['space_id']);
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
        $result   = $this->validate($data, 'Venue.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = VenueModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 场馆下拉列表
     *
     */
    public function select()
    {
        $venue = VenueModel::field('id,name')->select();
        if (!empty($venue)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $venue]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }
    }
}
