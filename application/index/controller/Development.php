<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Development as DevelopmentModel;

class Development extends Controller
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
            'date_time' => $date_time,
            'description' => $description
        ];
        $result = $this->validate($data, 'Development');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $development = new DevelopmentModel();
        if (empty($id)) {
            $result = $development->save($data);
        } else {
            $result = $development->save($data,['id' => $id]);
        }

        if ($result) {
            return json(['code' => 200, 'message' => '保存成功']);
        } else {
            return json(['code' => 200, 'message' => '保存失败']);
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
        //
    }
}
