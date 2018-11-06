<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Development as DevelopmentModel;
use app\index\model\TeamChange;

class Development extends BasisController
{
    /**
     * 显示资源列表
     *
     */
    public function index()
    {
        //
    }


    /**
     * 发展历程新建更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $enter_team_id = request()->param('enter_team_id');
        $date_time = request()->param('date_time');
        $description = request()->param('description');
        // 验证参数
        $data = [
            'id' => $id,
            'enter_team_id' => $enter_team_id,
            'date' => $date_time,
            'description' => $description
        ];
        $result = $this->validate($data, 'Development');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $development = new DevelopmentModel();
        $change = new TeamChange();
        $development->startTrans();
        try{
            if (empty($id)) {
                $development->save($data);
                $data['id'] = $development->id;
                $before = [];
                $after = $data;
                $change_data = [
                    'enter_team_id' => $enter_team_id,
                    'project' => 1,
                    'before_change' => $before,
                    'after_change' => $after,
                    'status' => 0
                ];
                $change->save($change_data);
            } else {
                $status = DevelopmentModel::where('id', $id)->value('status');
                if (!$status) {
                    return json(['code' => 401, 'message' => '正在审核中的发展历程不能修改']);
                }
                /* 插入资料审核表 */
                // 获取原来数据
                $develop = DevelopmentModel::get($id)->toArray();
                $before = [];
                $after = [];
                $diff = array_diff($develop, $data);
                if (!empty($diff)) {
                    $before = $develop;
                    $after = $data;
                    $data['status'] = 0;
                }
                $development->save($data, ['id' => $id]);
            }
            if (!empty($after)) {
                $change_data = [
                    'enter_team_id' => $enter_team_id,
                    'project' => 1,
                    'before_change' => $before,
                    'after_change' => $after,
                    'status' => 0
                ];
                $result = $this->validate($data,'TeamChange.save');
                if (true !== $result) {
                    return json(['code' => 401, 'message' => $result]);
                }
                $change->save($change_data);
            }
            $development->commit();
            return json(['code' => 200, 'message' => '提交成功']);
        } catch (\Exception $e) {
            $development->rollback();
            return json(['code' => 404, 'message' => $e->getMessage()]);
        }
    }

    /**
     * 发展历程详情
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

        $result   = $this->validate($data, 'Development.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = DevelopmentModel::where('id', $id)->find();

        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        // 获取前端传的参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'Development.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $delete = DevelopmentModel::where('id', $id)->delete();
        if ($delete) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }

    }
}
