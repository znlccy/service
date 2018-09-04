<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Company as CompanyModel;

class Company extends Controller
{
    /**
     * 显示公司列表
     *
     */
    public function index()
    {
        // 获取客户端提供的参数
        $page_size = request()->param('page_size', 8);
        $jump_page = request()->param('jump_page', 1);
        $id = request()->param('id');
        $name = request()->param('name');
        $phone = request()->param('phone');

        // 验证参数
        $data = [
            'page_size'        => $page_size,
            'jump_page'        => $jump_page,
            'name'             => $name,
            'id'               => $id,
            'phone'            => $phone
        ];
        $result = $this->validate($data, 'Company.index');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        // 组合过滤筛选条件
        $conditions = [];
        if ($id) {
            $conditions['id'] = $id;
        }
        if ($name) {
            $conditions['name'] = ['like', '%' . $name . '%'];
        }
        $company = CompanyModel::where($conditions)
                ->order('id')
                ->paginate($page_size, false, ['page' => $jump_page]);
        return json(['code'=> 200, 'message' => '获取公司列表成功', 'data' => $company]);
    }


    /**
     * 公司新建更新
     *
     */
    public function save()
    {
        // 获取客户端提供的参数
        $id          = request()->param('id');
        $name       = request()->param('name');
        $profile       = request()->param('profile');
        $address       = request()->param('address');
        $phone       = request()->param('phone');
        $logo       = request()->file('logo');
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
            'id'               => $id,
            'name'             => $name,
            'profile'          => $profile,
            'address'          => $address,
            'phone'            => $phone,
            'logo'             => $logo
        ];

        $result = $this->validate($data, 'Company.save');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        if (empty($id)) {
            $company = new CompanyModel();
            $result = $company->save($data);
        } else {
            // 更新
            if (empty($logo)) {
                unset($data['logo']);
            }
            $company = new CompanyModel();
            $result = $company->save($data, ['id', $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
        }


    }


    /**
     * 公司详情
     *
     */
    public function detail()
    {
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'Company.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = CompanyModel::where('id', $id)->find();

        if ($detail) {
            return json(['code' => 200, 'message' => '获取详情成功!', 'data' => $detail]);
        } else {
            return json(['code' => 404, 'message' => '获取详情失败!']);
        }
    }

    /**
     * 公司删除
     *
     */
    public function delete()
    {
        $id = request()->param('id/d');
        /* 验证 */
        $data = [
            'id' => $id,
        ];
        $result   = $this->validate($data, 'Company.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = CompanyModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

}
