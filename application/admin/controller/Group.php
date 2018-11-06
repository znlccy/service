<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13
 * Time: 13:51
 */

namespace app\admin\controller;

use think\App;
use app\admin\model\Group as GroupModel;

class Group extends BaseController {

    /* 声明分组模型 */
    protected $group_model;

    /* 分组分页器 */
    protected $group_page;

    /* 默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->group_model = new GroupModel();
        $this->group_page = config('page.pagination');
    }

    /* 分组列表 */
    public function index() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');
        $name = $this->request->param('name');
        $sort = $this->request->param('sort');
        $create_start = $this->request->param('create_start');
        $create_end = $this->request->param('create_end');
        $update_start = $this->request->param('update_start');
        $update_end = $this->request->param('update_end');
        $page_size = $this->request->param('page_size/d', $this->group_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page/d', $this->group_page['JUMP_PAGE']);

        /* 验证数据 */
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'sort'          => $sort,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Group.index');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 筛选条件 */
        $conditions = [];
        if ($id) {
            $conditions[] = ['id', '=', $id];
        }
        if ($name) {
            $conditions[] = ['name', 'like', '%' . $name . '%'];
        }
        if ($sort) {
            $conditions[] = ['sort', '=', $sort];
        }
        if ($create_start && $create_end) {
            $conditions[] = ['create_time', 'between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions[] = ['update_time', 'between time', [$update_start, $update_end]];
        }

        /* 返回结果 */
        $group = $this->group_model
            ->where($conditions)
            ->order('sort', 'desc')
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($group) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $group
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败'
            ]);
        }
    }

    /* 分组添加更新 */
    public function save() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');
        $name = $this->request->param('name');
        $sort = $this->request->param('sort');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id,
            'name'      => $name,
            'sort'      => $sort
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Group.save');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 判断是更新还是添加 */
        if (empty($id) || is_null($id)) {
            $operation = $this->group_model->save($validate_data);
        } else {
            $operation = $this->group_model->save($validate_data, ['id' => $id]);
        }

        if ($operation) {
            return json([
                'code'      => 200,
                'message'   => '操作数据成功'
            ]);
        } else {
            return json([
                'code'      => 401,
                'message'   => '操作数据失败'
            ]);
        }
    }

    /* 分组详情 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Group.detail');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $group = $this->group_model->where('id', $id)->find();

        if ($group) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $group
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败'
            ]);
        }
    }

    /* 分组删除 */
    public function delete() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Group.delete');
        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $delete = $this->group_model->where('id', $id)->delete();
        if ($delete) {
            return json([
                'code'      => 200,
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '删除数据失败，数据不存在'
            ]);
        }
    }
}