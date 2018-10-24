<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/17
 * Time: 13:25
 * Comment: 选项控制器
 */

namespace app\admin\controller;

use app\admin\model\Option as OptionModel;
use think\App;

class Option extends BaseController {

    /* 选项模型 */
    protected $option_model;

    /* 选项分页 */
    protected $option_page;

    /* 默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->option_model = new OptionModel();
        $this->option_page = config('page.pagination');
    }

    /* 选项列表 */
    public function index() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');
        $content = $this->request->param('content');
        $create_start = $this->request->param('create_start');
        $create_end = $this->request->param('create_end');
        $update_start = $this->request->param('update_start');
        $update_end = $this->request->param('update_end');
        $page_size = $this->request->param('page_size');
        $jump_page = $this->request->param('jump_page');

        /* 验证数据 */
        $validate_data = [
            'id'            => $id,
            'content'       => $content,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Option.index');

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
        if ($content) {
            $conditions[] = ['content', 'like', '%' . $content . '%'];
        }
        if ($create_start && $create_end) {
            $conditions[] = ['create_time', 'between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions[] = ['update_time', 'between time', [$update_start,$update_end]];
        }

        /* 返回结果 */
        $option = $this->option_model
            ->where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($option) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $option
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败,数据不存在'
            ]);
        }
    }

    /* 选项添加更新 */
    public function save() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');
        $question_id = $this->request->param('question_id');
        $content = $this->request->param('content');

        /* 验证数据 */
        $validate_data = [
            'id'            => $id,
            'question_id'   => $question_id,
            'content'       => $content
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Option.save');

        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        if (empty($id) || is_null($id)) {
            $operation = $this->option_model->save($validate_data);
        } else {
            $operation = $this->option_model->save($validate_data, ['id' => $id]);
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

    /* 选项详情 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Option.detail');

        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $policy = $this->option_model->where('id', $id)->find();

        if ($policy) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功'
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败，数据不存在'
            ]);
        }
    }

    /* 删除选项 */
    public function delete() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Option.delete');

        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $operation = $this->option_model->where('id', $id)->delete();
        if ($operation) {
            return json([
                'code'      => 200,
                'message'   => '删除数据成功',
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '删除数据失败，数据不存在'
            ]);
        }
    }

}