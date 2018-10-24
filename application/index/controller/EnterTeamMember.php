<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\EnterTeamMember as EnterTeamMemberModel;
use app\index\model\TeamChange;

class EnterTeamMember extends BasisController
{
    /**
     * 显示资源列表
     *
     */
    public function index()
    {
        // 获取客户端提供的参数
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
        $result = $this->validate($data, 'EnterTeamMember.index');
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
        $member = EnterTeamMemberModel::where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $member]);
    }


    /**
     * 成员新增更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $name = request()->param('name');
        $position = request()->param('position');
        $signature = request()->param('signature');
        $achievement = request()->param('achievement');
        $resume = request()->param('resume');
        $picture = request()->file('picture');
        $enter_team_id = request()->param('enter_team_id');
        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                //成功上传后，获取上传信息
                //输出jpg
                /*echo '文件扩展名:' . $info->getExtension() .'<br>';*/
                $ext = strtolower($info->getExtension());
                // 允许上传的格式
                $allow_ext = ['jpg', 'gif', 'png', 'jpeg'];
                if (!in_array($ext, $allow_ext)) {
                    return json(['code' => 401, 'message' => '上传图片格式不正确(仅支持jpg、gif、 png、 psd)']);
                }
                // 图片文件大小
                $size = $info->getSize();
                $picture_max_size = config('picture_max_size');
                if ($size > $picture_max_size) {
                    return json(['code' => 401, 'message' => '上传的图片过大(最不不超过3M)']);
                }
                //输出文件格式
                /*echo '文件详细的路径加文件名:' . $info->getSaveName() .'<br>';*/
                //输出文件名称
                /*echo '文件保存的名:' . $info->getFilename();*/
                $sub_path     = str_replace('\\', '/', $info->getSaveName());
                $picture = '/images/' . $sub_path;
            }
        }
        // 验证
        $data = [
            'id' => $id,
            'name' => $name,
            'position' => $position,
            'signature' => $signature,
            'achievement' => $achievement,
            'resume' => $resume,
            'picture' => $picture,
            'enter_team_id' => $enter_team_id,
        ];
        $result = $this->validate($data,'EnterTeamMember');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        $team_member = new EnterTeamMemberModel();
        $change = new TeamChange();
        $team_member->startTrans();
        try {
            if (empty($id)) {
                $team_member->save($data);
                $data['id'] = $team_member->id;
                $before = [];
                $after = $data;
                $change_data = [
                    'enter_team_id' => $enter_team_id,
                    'project' => 2,
                    'before_change' => $before,
                    'after_change' => $after,
                    'status' => 0
                ];
                $change->save($change_data);
            } else {
                $status = EnterTeamMemberModel::where('id', $id)->value('status');
                if (!$status) {
                    return json(['code' => 401, 'message' => '正在审核中的成员不能修改']);
                }
                if (empty($picture)) {
                    unset($data['picture']);
                }
                // 插入资料审核表
                $member = EnterTeamMemberModel::get($id)->toArray();
                $before = [];
                $after = [];
                $diff = array_diff($data, $member);
                if (!empty($diff)) {
                    $before = $member;
                    $after = $data;
                    $data['status'] = 0;
                }
                $team_member->save($data, ['id' => $id]);
                if (!empty($after)) {
                    $change_data = [
                        'enter_team_id' => $member['enter_team_id'],
                        'project' => 2,
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
            }
            $team_member->commit();
            return json(['code' => 200, 'message' => '提交审核成功']);
        } catch (\Exception $e) {
            $team_member->rollback();
            return json(['code' => 404, 'message' => $e->getMessage()]);
        }

    }

    /**
     * 成员详情
     *
     *
     */
    public function detail(){
        // 获取前端传的参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'EnterTeamMember.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = EnterTeamMemberModel::where('id', $id)->find();

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
        $result   = $this->validate($data, 'EnterTeamMember.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = EnterTeamMemberModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }
}
