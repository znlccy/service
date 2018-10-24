<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\EnterTeam as EnterTeamModel;

class EnterTeam extends BasisController
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
        $status = request()->param('status/d');
        $company = request()->param('company');
        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'company'     => $company,
            'id'               => $id,
            'status'           => $status,
        ];
        $result = $this->validate($data, 'EnterTeam.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($status) {
            $conditions[] = ['status', '=', $status];
        }
        if ($company) {
            $conditions[] = ['company', 'like', '%' . $company . '%'];
        }
        $enter_team = EnterTeamModel::where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $enter_team]);
    }


    /**
     * 入驻团队新增更新
     *
     */
    public function save()
    {
        // 获取参数
        $id = request()->param('id');
        $company = request()->param('company');
        $admin_account = request()->param('admin_account');
        $business_license = request()->param('business_license');
        $bl_picture = request()->file('bl_picture');
        $legal_person = request()->param('legal_person');
        $id_card = request()->param('id_card');
        $id_card_pictures = request()->file('id_card_pictures');
        $main_business = request()->param('main_business');
        $develop_stage = request()->param('develop_stage');
        $description = request()->param('description');
        $logo = request()->file('logo');
        $status = request()->param('status', 1);
        $user_id = request()->param('user_id');
        if ($id_card_pictures) {
            $arr_picture = [];
            foreach ($id_card_pictures as $value) {
                $info = $value->move(ROOT_PATH . 'public' . DS . 'images');
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
                    $arr_picture[] = '/images/' . $sub_path;
                }
            }
            $id_card_pictures = json_encode($arr_picture);
        }
        // 移动图片到框架应用根目录/public/images
        if ($bl_picture) {
            $info = $bl_picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                //成功上传后，获取上传信息
                //输出jpg
                /*echo '文件扩展名:' . $info->getExtension() .'<br>';*/
                $ext = strtolower($info->getExtension());
                // 允许上传的格式
                $allow_ext = ['jpg', 'gif', 'png', 'jpeg'];
                if (!in_array($ext, $allow_ext)) {
                    return json(['code' => 401, 'message' => '上传图片格式不正确(仅支持jpg、gif、 png、 jpeg)']);
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
                $bl_picture = '/images/' . $sub_path;
            }
        }
        // 移动图片到框架应用根目录/public/images
        if ($logo) {
            $info = $logo->move(ROOT_PATH . 'public' . DS . 'images');
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
                $logo = '/images/' . $sub_path;
            }
        }
        // 验证参数
        $data = [
            'id' => $id,
            'company' => $company,
            'admin_account' => $admin_account,
            'business_license' => $business_license,
            'bl_picture' => $bl_picture,
            'legal_person' => $legal_person,
            'id_card' => $id_card,
            'id_card_pictures' => $id_card_pictures,
            'main_business' => $main_business,
            'develop_stage' => $develop_stage,
            'description' => $description,
            'logo' => $logo,
            'status' => $status,
            'user_id' => $user_id
        ];
        $result = $this->validate($data,'EnterTeam');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        if (empty($id)) {
            $enter_team = new EnterTeamModel();
            $result = $enter_team->save($data);
        } else {
            if (!$bl_picture) {
                unset($data['bl_picture']);
            }
            if (!$logo) {
                unset($data['logo']);
            }
            if (!$id_card_pictures) {
                unset($data['id_card_pictures']);
            }
            $enter_team = new EnterTeamModel();
            $result = $enter_team->save($data,['id', $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
        }
    }

    /**
     * 入驻团队详情
     *
     */
    public function detail(){
        // 获取前端传的参数
//        $id = request()->param('id');
//        /* 验证 */
//        $data = [
//            'id' => $id,
//        ];
//
//        $result   = $this->validate($data, 'EnterTeam.detail');
//        if (true !== $result) {
//            return json(['code' => 401, 'message' => $result]);
//        }
        // 获取当前用户的team_id
        $user = session('user');
        if ($user) {
            $detail = EnterTeamModel::with(['developments' => function($query){
                $query->order('date');
            },'members', 'linkman'])->where('user_id', $user['id'])->find();
            if ($detail) {
                return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
            }
        }
        return json(['code' => 404, 'message' => '获取详情失败!']);
    }

    /**
     * 入驻团队详细介绍
     */
    public function introduce()
    {
        // 获取参数
        $id = request()->param('id');
        $data = [
          'id' => $id,
        ];
        // 验证
        $result = $this->validate($data, 'EnterTeam.introduce');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $team = EnterTeamModel::with(['developments','members', 'linkman'])->where($data)->find();
        if ($team) {
            return json(['code' => 200, 'message'=>'获取信息成功', 'data' => $team]);
        } else {
            return json(['code' => 404, 'message'=>'获取信息失败']);
        }
    }

}
