<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 18:20
 * Comment: 服务商控制器
 */

namespace app\admin\controller;

use think\App;
use app\admin\model\Facilitator as FacilitatorModel;

class Facilitator extends BaseController {

    /* 声明服务商品模型 */
    protected $facilitator_model;

    /* 声明服务商品分页器 */
    protected $facilitator_page;

    /* 默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->facilitator_model = new FacilitatorModel();
        $this->facilitator_page = config('page.pagination');
    }

    /* 服务商品列表 */
    public function index() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $url = $this->request->param('url');
        $profile = $this->request->param('profile');
        $description = $this->request->param('description');
        $price_start = $this->request->param('price_start');
        $price_end = $this->request->param('price_end');
        $validate_start = $this->request->param('validate_start');
        $validate_end = $this->request->param('validate_end');
        $status = $this->request->param('status');
        $create_start = $this->request->param('create_start');
        $create_end = $this->request->param('create_end');
        $update_start = $this->request->param('update_start');
        $update_end = $this->request->param('update_end');
        $publisher = $this->request->param('publisher');
        $page_size = $this->request->param('page_size', $this->facilitator_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page', $this->facilitator_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'url'           => $url,
            'profile'       => $profile,
            'description'   => $description,
            'price_start'   => $price_start,
            'price_end'     => $price_end,
            'validate_start'=> $validate_start,
            'validate_end'  => $validate_end,
            'status'        => $status,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'publisher'     => $publisher,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Facilitator.index');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //筛选条件
        $conditions = [];

        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($title) {
            $conditions[] = ['title', 'like', '%' . $title . '%'];
        }
        if ($url) {
            $conditions[] = ['url', 'like', '%' . $url . '%'];
        }
        if ($profile) {
            $conditions[] = ['profile', 'like', '%' . $profile . '%'];
        }
        if ($description) {
            $conditions[] = ['description', 'like', '%' . $description . '%'];
        }
        if ($price_start && $price_end) {
            $conditions[] = ['price', 'between', [$price_start, $price_end]];
        }
        if ($validate_start && $validate_end) {
            $conditions[] = ['validate_time', 'between time', [$validate_start, $validate_end]];
        }
        if (is_null($status)) {
            $conditions[] = ['status', 'in',[0,1]];
        } else {
            switch ($status) {
                case 0:
                    $conditions['status'] = $status;
                    break;
                case 1:
                    $conditions['status'] = $status;
                    break;
                default:
                    break;
            }
        }
        if ($create_start && $create_end) {
            $conditions[] = ['create_time', 'between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions[] = ['update_time', 'between time', [$update_start, $update_end]];
        }
        if ($publisher) {
            $conditions[] = ['publisher', 'like', '%' . $publisher . '%'];
        }

        //返回结果
        $facilitator = $this->facilitator_model->where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($facilitator) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $facilitator
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败'
            ]);
        }
    }

    /* 服务商品添加更新 */
    public function save() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $url = $this->request->param('url');
        $profile = $this->request->param('profile');
        $description = $this->request->param('description');
        $price = $this->request->param('price');
        $validate_time = $this->request->param('validate_time');
        $publisher = session('admin.mobile');
        $status = $this->request->param('status');
        $picture = $this->request->file('picture');
        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                //成功上传后，获取上传信息
                //输出文件保存路径
                $sub_path = str_replace('\\', '/', $info->getSaveName());
                $picture  = '/images/' . $sub_path;
            }
        }

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'url'           => $url,
            'profile'       => $profile,
            'description'   => $description,
            'price'         => $price,
            'picture'       => $picture,
            'validate_time' => $validate_time,
            'publisher'     => $publisher,
            'status'        => $status
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Facilitator.save');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        if (empty($id)) {
            $operator = $this->facilitator_model->save($validate_data);
        } else {
            $operator = $this->facilitator_model->save($validate_data, ['id' => $id]);
        }

        if ($operator) {
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

    /* 服务商品详情 */
    public function detail() {

        //接收客户端提供的数据
        $id = $this->request->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Facilitator.detail');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $facilitator = $this->facilitator_model->where('id', $id)->find();

        if ($facilitator) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $facilitator
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败,数据库中不存在',
            ]);
        }
    }

    /* 服务商品删除 */
    public function delete() {

        //接收客户端提交的数据
        $id = $this->request->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Facilitator.delete');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $facilitator = $this->facilitator_model->where('id', $id)->delete();
        if ($facilitator) {
            return json([
                'code'      => '200',
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '删除数据失败,数据库中不存在'
            ]);
        }
    }

}