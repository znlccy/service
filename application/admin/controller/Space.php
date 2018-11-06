<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Space as SpaceModel;
use app\admin\model\Workplace;
use app\admin\model\OrderWorkplace;

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
        $space = SpaceModel::with('operation_team')->where($conditions)
            ->order('id')
            ->paginate($page_size, false, ['page' => $jump_page])
            ->each(function($item){
                $rate = $this->rate($item['id']);
                $item['enter_rate'] = $rate;
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
        $operation_team_id = request()->param('operation_team_id', 0);
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
        $space = new SpaceModel();
        if (empty($id)) {
            $result = $space->save($data);
        } else {
            if (empty($position_picture)) {
                unset($data['position_picture']);
            }
            if (empty($space_pictures)) {
                unset($data['space_pictures']);
            }
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
        $detail = SpaceModel::with(['operation_team','province','city','district'])->where('id', $id)->find();
        $detail['enter_rate'] = $this->rate($detail['id']);

        if ($detail) {
            unset($detail['province_id'],$detail['city_id'],$detail['district_id']);
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
     *
     */
    public function select()
    {
        $operation_team_id = session('admin.operation_team_id');
        if ($operation_team_id) {
            $space = SpaceModel::field('id,name')->where('operation_team_id', $operation_team_id)->select();
        } else {
            $space = SpaceModel::field('id,name')->select();
        }
        if (!empty($space)) {
            return json(['code' => 200, 'message' => '获取下拉列表成功', 'data' => $space]);
        } else {
            return json(['code' => 404, 'message' => '获取下拉列表失败']);
        }
    }

    /**
     * 计算空间入驻率
     *
     */
    public function rate($id)
    {
        // 计算按个工位入驻率
        $one_sum_count = Workplace::where(['space_id' => $id, 'type' => 0])->count();
        if ($one_sum_count) {
            $one_lease_count = Workplace::where(['space_id' => $id, 'type' => 0, 'status' => 0])->count();
            $one_rate = bcdiv($one_lease_count, $one_sum_count, 2);
        }
        // 计算按面积工位入驻率
        $area_sum = Workplace::where(['space_id' => $id, 'type' => 1])->sum('total_area');
        if ($area_sum) {
            // 获取该空间下的所有按面积计算工位id
            $area_workplace_ids = Workplace::where(['space_id' => $id, 'type' => 1])->column('id');
            $area_lease_sum = OrderWorkplace::whereIn('workplace_id', $area_workplace_ids)->sum('workplace_area');
            $area_rate = bcdiv($area_lease_sum, $area_sum, 2);
        }
        if (isset($one_rate) && isset($area_rate)) {
            $rate = bcdiv($one_rate + $area_rate, 2, 2);
        } elseif(isset($one_rate)) {
            $rate = $one_rate;
        } elseif(isset($area_rate)) {
            $rate = $area_rate;
        } else {
            $rate = 0;
        }
        // 最终入驻率
        return $rate;
    }

}
