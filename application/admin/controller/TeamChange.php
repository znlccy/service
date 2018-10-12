<?php

namespace app\admin\controller;

use think\Controller;
use think\image\Exception;
use think\Request;
use app\admin\model\TeamChange as TeamChangeModel;
use app\admin\model\Development;
use app\admin\model\EnterTeamMember;

class TeamChange extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // 获取参数
        $page = config('page.pagination');
        $page_size = request()->param('page_size/d', $page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d', $page['JUMP_PAGE']);
        $id = request()->param('id');
        $status = request()->param('status');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'status'             => $status,
            'id'               => $id,
        ];
        $result = $this->validate($data, 'TeamChange.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if (is_null($status)) {
            $conditions[] = ['status', 'in',[0,1,2]];
        } else {
            switch ($status) {
                case 0:
                    $conditions[] = ['status', '=', $status];
                    break;
                case 1:
                    $conditions[] = ['status', '=', $status];
                    break;
                case 2:
                    $conditions[] = ['status', '=', $status];
                default:
                    break;
            }
        }
        $team_change = TeamChangeModel::where($conditions)
            ->with(['team', 'user'])
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item){
                unset($item['check_user'],$item['enter_team_id']);
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $team_change]);
    }

    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'TeamChange.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = TeamChangeModel::where('id', $id)->with(['team','user'])->find();
        if ($detail) {
            unset($detail['check_user'],$detail['enter_team_id']);
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }

    }


    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }


    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    /**
     * 审核
     */
    public function check()
    {
        $id = request()->param('id');
        $status = request()->param('status/d');
        $check_user = session('admin.id');
        $check_time = date('Y-m-d H:i:s', time());
        $data = [
          'id' => $id,
          'status' => $status,
          'check_user' => $check_user,
          'check_time' => $check_time
        ];
        $result = $this->validate($data, 'TeamChange.check');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $team_change = TeamChangeModel::get($id);
        if ($team_change && $status === 1) {
            $team_change->startTrans();
            try {
                $team_change->status = $status;
                $team_change->check_user = $check_user;
                $team_change->check_time = $check_time;
                $team_change->save();
                // 根据变更项目修改原来的数据
                switch ($team_change->project) {
                    case 1: // 发展历程
                        $after_data = $team_change->after_change;
                        $develop = Development::update($after_data);
                        break;
                    case 2: // 团队成员
                        $after_data = $team_change->after_change;
                        $member = EnterTeamMember::update($after_data);
                        break;
                    default:
                        break;
                }
                $team_change->commit();
                return json(['code' => 200, 'message' => '审核成功']);
            } catch (\Exception $e) {
                $team_change->rollback();
                return json(['code' => 404, 'message' => '审核失败']);
            }
        } elseif ($status === 2) {
            $team_change->status = $status;
            $team_change->check_user = $check_user;
            $team_change->check_time = $check_time;
            if($team_change->save()) {
                return json(['code' => 200, 'message' => '拒绝成功']);
            } else {
                return json(['code' => 404, 'message' => '拒绝失败']);
            }
        }


    }
}
