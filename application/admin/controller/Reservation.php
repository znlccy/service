<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Reservation as ReservationModel;
use app\admin\model\Venue;

class Reservation extends BaseController
{
    /**
     * 显示场馆预约列表
     *
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
//        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
//        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $venue_id = request()->param('venue_id');
        $date = request()->param('date', date('Y-m-d', time()));
        // 参数验证
        $data = [
            'venue_id' => $venue_id,
            'date' => $date
//            'page_size' => $page_size,
//            'jump_page' => $jump_page,
        ];
        $result = $this->validate($data, 'Reservation.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        // 组合过滤条件
        $conditions = [];
        if (!empty($venue_id)) {
            $conditions['venue_id'] = $venue_id;
        }
        if ($date) {
            $conditions['date'] = $date;
        }
        $data = [];
        $teams = ReservationModel::with(['team'])->where($conditions)
            ->select();
        $venue = Venue::with(['space' => function($query){
            $query->field('id,name');
        }])->where('id',$venue_id)->find();
        $data['venue'] = $venue;
        $data['teams'] = $teams;
        return json(['code' => 200, 'message' => '获取消息列表成功', 'data' => $data]);
    }


    /**
     * 新增更新预约
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $venue_id = request()->param('venue_id');
        $enter_team_id = request()->param('enter_team_id');
        $date = request()->param('date');
        $reservation_time = request()->param('reservation_time');
        $status = request()->param('status', 0);
        // 验证
        $insert_data = [
            'id' => $id,
            'venue_id' => $venue_id,
            'enter_team_id' => $enter_team_id,
            'date' => $date,
            'reservation_time' => $reservation_time,
            'status' => $status
        ];
        $result = $this->validate($insert_data, 'Reservation');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $is_res_time = ReservationModel::where(['venue_id' => $venue_id, 'date' => $date])->column('reservation_time');
        $data = [];
        foreach ($is_res_time as $value) {
            $data = array_unique(array_merge($data, json_decode($value, true)));
        }
        $diff = array_intersect($reservation_time, $data);
        if ($diff) {
            return json(['code' => 404, 'message' => '预约时间段冲突']);
        }
        $reservation = new ReservationModel();
        if (empty($id)) {
            $result = $reservation->save($insert_data);
        } else {
            $result = $reservation->save($insert_data, ['id' => $id]);
        }

        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 404, 'message' => '保存失败']);
        }
    }


    /**
     * 预约详情
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

        $result   = $this->validate($data, 'Reservation.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = ReservationModel::with(['team','venue'=>function($query){
            $query->field("id,name");
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
        $result   = $this->validate($data, 'Reservation.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = ReservationModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 预约审核
     *
     */
    public function check()
    {
        // 获取参数
        // 当前用户
        $user = session('admin');
        $check_user = $user['id'];
        $check_time = date('Y-m-d H:i:s', time());
        $status = request()->param('status');
        $remark = request()->param('remark');
        $id = request()->param('id');
        // 验证
        $data = [
            'id' => $id,
            'check_user' => $check_user,
            'check_time' => $check_time,
            'status' => $status,
            'remark' => $remark
        ];
        $result = $this->validate($data, 'Reservation.check');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 更新
        $reservation = new ReservationModel();
        $result = $reservation->save($data,['id' => $id]);
        if ($result) {
            return json(['code' => 200, 'message' => '审核成功']);
        } else {
            return json(['code' => 404, 'message' => '审核失败']);
        }
    }
}
