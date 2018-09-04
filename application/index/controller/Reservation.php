<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Reservation as ReservationModel;
use app\index\model\Venue;

class Reservation extends Controller
{
    /**
     * 显示场馆预约列表
     *
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $venue_id = request()->param('venue_id');
        $date = request()->param('date');
        // 获取当前用户

        // 参数验证
        $data = [
            'venue_id' => $venue_id,
            'date' => $date,
            'page_size' => $page_size,
            'jump_page' => $jump_page,
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

        $teams = ReservationModel::with(['team','venue'])->where($conditions)
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code' => 200, 'message' => '获取预约列表成功', 'data' => $teams]);
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
        // 验证
        $data = [
            'id' => $id,
            'venue_id' => $venue_id,
            'enter_team_id' => $enter_team_id,
            'date' => $date,
            'reservation_time' => $reservation_time
        ];
        $result = $this->validate($data, 'Reservation');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $reservation = new ReservationModel();
        if (empty($id)) {
            $result = $reservation->save($data);
        } else {
            $result = $reservation->save($data, ['id' => $id]);
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
}
