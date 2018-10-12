<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Space as SpaceModel;

class Space extends BaseController
{
    /**
     * 显示资源列表
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
        $result = $this->validate($data, 'Space.index');
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
        $space = SpaceModel::with(['OperationTeam' => function($query) {
            $query->field('id,name');
        }])->where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item){
                unset($item['operation_team_id']);
            });
        return json(['code'=> 200, 'message' => '获取列表成功', 'data' => $space]);
    }

    /**
     * 新增更新保存
     *
     */
    public function save()
    {
        // 获取前端传的参数
        $id  = request()->param('id');
        $name = request()->param('name');
        $operation_team_id = request()->param('operation_team_id');
        $province_id = request()->param('province_id');
        $city_id = request()->param('city_id');
        $district_id = request()->param('district_id');
        $short_name = request()->param('short_name');
        $address = request()->param('address');
        $short_description = request()->param('short_description');
        $description = request()->param('description');
        $position_picture = request()->file('position_picture');
        $space_pictures = request()->file('space_pictures');
        if ($position_picture) {
            $info = $position_picture->move(ROOT_PATH . 'public' . DS . 'images');
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
                $position_picture = '/images/' . $sub_path;
            }
        }
        if ($space_pictures) {
            $arr_space_picture = [];
            foreach ($space_pictures as $space_picture) {
                $i = 0;
                if ($i > 6) {
                    return json(['code' => 401, 'message' => '空间图片最多上传6张']);
                }
                $info = $space_picture->move(ROOT_PATH . 'public' . DS . 'images');
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
                    $arr_space_picture[] = '/images/' . $sub_path;
                }
                $i++;
            }
            $space_pictures = json_encode($arr_space_picture);
        }
        // 验证参数
        $data = [
            'id' => $id,
            'name' => $name,
            'operation_team_id' => $operation_team_id,
            'province_id' => $province_id,
            'city_id' => $city_id,
            'district_id' => $district_id,
            'short_name' => $short_name,
            'address' => $address,
            'short_description' => $short_description,
            'description' => $description,
            'position_picture' => $position_picture,
            'space_pictures' => $space_pictures
        ];
        $result = $this->validate($data, 'Space');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        if (empty($id)) {
            $space = new SpaceModel();
            $result = $space->save($data);
        } else {
            if (empty($position_picture)) {
                unset($data['position_picture']);
            }
            if (empty($space_pictures)) {
                unset($data['space_pictures']);
            }
            $space = new SpaceModel();
            $result = $space->save($data, ['id' => $id]);
        }
        if ($result) {
            return json(['code' => 200, 'message' => '保存成功!']);
        } else {
            return json(['code' => 404, 'message' => '保存失败!']);
        }

    }

    /**
     * 空间详细
     *
     */
    public function detail()
    {
        // 获取参数
        $id = request()->param('id');
        /* 验证 */
        $data = [
            'id' => $id,
        ];

        $result   = $this->validate($data, 'Space.detail');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $detail = SpaceModel::with(['operationTeam','province','city','district'])->where('id', $id)->find();

        if ($detail) {
            unset($detail['operation_team_id'],$detail['province_id'],$detail['city_id'],$detail['district_id']);
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
        $result   = $this->validate($data, 'Space.delete');
        if (true !== $result) {
            return json(['code' => 401, 'message' => $result]);
        }
        $result = SpaceModel::destroy($id);
        if ($result) {
            return json(['code' => 200, 'message' => '删除成功!']);
        } else {
            return json(['code' => 404, 'message' => '删除失败!']);
        }
    }

    /**
     * 空间下拉列表
     */
    public function select()
    {
        $space = SpaceModel::field('id,name')->select();
        if (!empty($space)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $space]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }
    }
}
