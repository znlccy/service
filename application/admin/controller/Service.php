<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 13:19
 * Comment: 服务商控制器
 */

namespace app\admin\controller;

use think\App;
use app\admin\model\Service as ServiceModel;
use app\admin\model\Group as GroupModel;

class Service extends BaseController {

    /* 声明服务模型 */
    protected $service_model;

    /* 声明分组模型 */
    protected $group_model;

    /* 声明服务分页 */
    protected $service_page;

    /* 声明默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->service_model = new ServiceModel();
        $this->group_model = new GroupModel();
        $this->service_page = config('page.pagination');
    }

    /* 服务商列表 */
    public function index() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');
        $name = $this->request->param('name');
        $profile = $this->request->param('profile');
        $description = $this->request->param('description');
        $price_start = $this->request->param('price_start');
        $price_end = $this->request->param('price_end');
        $recommend = $this->request->param('recommend');
        $status = $this->request->param('status');
        $address = $this->request->param('address');
        $create_start = $this->request->param('create_start');
        $create_end = $this->request->param('create_end');
        $update_start = $this->request->param('update_start');
        $update_end = $this->request->param('update_end');
        $validate_start = $this->request->param('validate_start');
        $validate_end = $this->request->param('validate_end');
        $publisher = $this->request->param('publisher');
        $page_size = $this->request->param('page_size/d', $this->service_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page/d', $this->service_page['JUMP_PAGE']);

        /* 验证数据 */
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'profile'       => $profile,
            'description'   => $description,
            'price_start'   => $price_start,
            'price_end'     => $price_end,
            'recommend'     => $recommend,
            'status'        => $status,
            'address'       => $address,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'validate_start'=> $validate_start,
            'validate_end'  => $validate_end,
            'publisher'     => $publisher,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Service.index');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 筛选条件 */
        $conditions = [];
        if ($id) {
            $conditions[] = ['sm.id', '=', $id];
        }
        if ($name) {
            $conditions[] = ['sm.name', 'like', '%' . $name . '%'];
        }
        if ($profile) {
            $conditions[] = ['sm.profile', 'like', '%' . $profile . '%'];
        }
        if ($description) {
            $conditions[] = ['sm.description', 'like', '%' . $description . '%'];
        }
        if ($price_start && $price_end) {
            $conditions[] = ['sm.price', 'between', [$price_start, $price_end]];
        }
        if (is_null($status)) {
            $conditions[] = ['sm.status', 'in',[0,1]];
        } else {
            switch ($status) {
                case 0:
                    $conditions[] = ['sm.status', '=', $status];
                    break;
                case 1:
                    $conditions[] = ['sm.status', '=', $status];
                    break;
                default:
                    break;
            }
        }
        if (is_null($recommend)) {
            $conditions[] = ['sm.recommend', 'in',[0,1]];
        } else {
            switch ($status) {
                case 0:
                    $conditions[] = ['sm.recommend', '=', $recommend];
                    break;
                case 1:
                    $conditions[] = ['sm.recommend', '=', $recommend];
                    break;
                default:
                    break;
            }
        }
        if ($address) {
            $conditions[] = ['sm.address', 'like', '%' . $address . '%'];
        }
        if ($create_start && $create_end) {
            $conditions[] = ['sm.create_time', 'between time', [$create_start,$create_end]];
        }
        if ($update_start && $update_end) {
            $conditions[] = ['sm.update_time', 'between time', [$update_start, $update_end]];
        }
        if ($validate_start && $validate_end) {
            $conditions[] = ['sm.validate_time', 'between time', [$validate_start, $validate_end]];
        }
        if ($publisher) {
            $conditions[] = ['sm.publisher', 'like', '%' . $publisher . '%'];
        }

        /* 返回结果 */
        $service = $this->service_model
            ->alias('sm')
            ->where($conditions)
            ->order('sm.id', 'desc')
            ->join('tb_group tg', 'sm.group_id = tg.id')
            ->field('sm.id, sm.name, sm.profile, sm.description, sm.price, sm.validate_time, sm.picture, sm.status, sm.recommend, sm.url, sm.address,sm.create_time, sm.update_time, sm.publisher, sm.rich_text, tg.name as group_name')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($service) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $service
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败'
            ]);
        }
    }


    /* 服务商添加更新 */
    public function save() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');
        $name = $this->request->param('name');
        $group_id = $this->request->param('group_id');
        $profile = $this->request->param('profile');
        $description = $this->request->param('description');
        $url = $this->request->param('url');
        $price = $this->request->param('price');
        $recommend = $this->request->param('recommend');
        $status = $this->request->param('status');
        $address = $this->request->param('address');
        $validate_time = date('Y-m-d H:i:s', time());
        $publisher = session('admin.mobile');
        $picture = $this->request->file('picture');
        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'upload');
            if ($info) {
                //成功上传后，获取上传信息
                //输出文件保存路径
                $sub_path = str_replace('\\', '/', $info->getSaveName());
                $picture  = '/images/' . $sub_path;
            }
        }
        $rich_text = $this->request->param('rich_text');

        /* 验证数据 */
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'group_id'      => $group_id,
            'profile'       => $profile,
            'description'   => $description,
            'url'           => $url,
            'price'         => $price,
            'recommend'     => $recommend,
            'picture'       => $picture,
            'status'        => $status,
            'address'       => $address,
            'publisher'     => $publisher,
            'validate_time' => $validate_time,
            'rich_text'     => $rich_text
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Service.save');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 判断添加还是更新 */
        if (empty($id) || is_null($id)) {
            $operation = $this->service_model->save($validate_data);
        } else {
            $operation = $this->service_model->save($validate_data, ['id' => $id]);
        }

        if ($operation) {
            return json([
                'code'      => '200',
                'message'   => '操作数据成功'
            ]);
        } else {
            return json([
                'code'      => '401',
                'message'   => '操作数据失败'
            ]);
        }
    }

    /* 服务商详情 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Service.detail');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $service = $this->service_model->where('id', $id)->find();

        if ($service) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $service
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败，数据不存在'
            ]);
        }

    }

    /* 服务商删除 */
    public function delete() {
        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Service.delete');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $service = $this->service_model->where('id', $id)->delete();

        if ($service) {
            return json([
                'code'      => '200',
                'message'   => '删除数据成功',
                'data'      => $service
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '删除数据失败，数据不存在'
            ]);
        }
    }

    /* 服务分组下拉列表 */
    public function spinner() {
        $group = $this->group_model
            ->order('sort', 'desc')
            ->field('id, name')
            ->select();

        if ($group) {
            return json([
                'code'      => '200',
                'message'   => '分组下拉获取成功',
                'data'      => $group
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '分组下拉获取失败',
            ]);
        }
    }

}