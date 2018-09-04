<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\EnterTeam as EnterTeamModel;

class EnterTeam extends Controller
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
        $bl_img = request()->file('bl_img');
        $legal_person = request()->param('legal_person');
        $id_card = request()->param('id_card');
        $id_card_picture = request()->file('id_card_picture');
        $main_business = request()->param('main_business');
        $develop_stage = request()->param('develop_stage');
        $description = request()->param('description');
        $logo = request()->file('logo');
        $status = request()->param('status', 1);
        if ($id_card_picture) {
            $arr_picture = [];
            foreach ($id_card_picture as $value) {
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
            $id_card_picture = json_encode($arr_picture);
        }
        // 移动图片到框架应用根目录/public/images
        if ($bl_img) {
            $info = $bl_img->move(ROOT_PATH . 'public' . DS . 'images');
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
                $bl_img = '/images/' . $sub_path;
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
            'bl_img' => $bl_img,
            'legal_person' => $legal_person,
            'id_card' => $id_card,
            'id_card_picture' => $id_card_picture,
            'main_business' => $main_business,
            'develop_stage' => $develop_stage,
            'description' => $description,
            'logo' => $logo,
            'status' => $status
        ];
        $result = $this->validate($data,'EnterTeam');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }

        if (empty($id)) {
            $enter_team = new EnterTeamModel();
            $result = $enter_team->save($data);
        } else {
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
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'EnterTeam.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = EnterTeamModel::where('id', $id)->find();

        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
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
