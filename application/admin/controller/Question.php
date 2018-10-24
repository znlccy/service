<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/17
 * Time: 13:23
 * Comment: 问题控制器
 */

namespace app\admin\controller;

use app\admin\model\Question as QuestionModel;
use app\admin\model\Option as OptionModel;
use think\App;

class Question extends BaseController {

    /* 声明问题模型 */
    protected $question_model;

    /* 声明选项模型 */
    protected $option_model;

    /* 声明问题分页 */
    protected $question_page;

    /* 声明默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->question_model = new QuestionModel();
        $this->option_model = new OptionModel();
        $this->question_page = config('page.pagination');
    }

    /* 问题列表 */
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
        $result = $this->validate($validate_data, 'Question.index');

        if (true !== $result) {
            return json([
                'code'      => '401',
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
            $conditions[] = ['update_time', 'between time', [$update_start, $update_end]];
        }

        /* 返回结果 */
        $question = $this->question_model
            ->where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($question) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $question
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败, 数据不存在'
            ]);
        }
    }

    /* 问题添加更新 */
    public function save() {

        /* 获取客户端提交过来的数据 */
        $id = $this->request->param('id');
        $content = $this->request->param('content');
        $options = $this->request->param('option/a');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id,
            'content'   => $content,
            'options'   => $options
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Question.save');

        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 添加问题列表 */
        $option_list = array();
        foreach ($options as $key => $option) {
            $option_list[$key]['content'] = $option;
        }

        /* 返回结果 */
        if (empty($id) || is_null($id)) {
            $question_id = $this->question_model->insertGetId($validate_data);
            $question = $this->question_model->where('id', $question_id)->find();
            $operator = $question->Option()->saveAll($option_list);
        } else {
            $question = $this->question_model->where('id', id)->find();
            $operator = $question->Option()->saveAll($option_list);
        }

        if ($operator) {
            return json([
                'code'      => 200,
                'message'   => '操作数据成功'
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '操作数据失败'
            ]);
        }
    }

    /* 问题详情 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Question.detail');

        if (true !== $result) {
            return json([
                'code'      => 401,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $question = $this->question_model->where('id', $id)
        ->with('option', function ($query) use ($id){
            $query->where('question_id', $id);
        })
        ->find();

        if ($question) {
            return json([
                'code'      => 200,
                'message'   => '查询数据成功',
                'data'      => $question
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '查询数据失败'
            ]);
        }
    }

    /* 问题删除 */
    public function delete() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Question.delete');

        if (true !== $result) {
            return json([
                'code'      => 200,
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $question = $this->question_model->where('id', $id)->delete();
        $operator = $this->option_model->where('question_id', $id)->delete();

        if ($question && $operator) {
            return json([
                'code'      => 200,
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => 404,
                'message'   => '删除数据失败'
            ]);
        }
    }

}