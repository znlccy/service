<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10
 * Time: 16:43
 * Comment: 问卷调差控制器
 */

namespace app\admin\controller;

use app\admin\model\Investigate as InvestigateModel;
use app\admin\model\Option as OptionModel;
use app\admin\model\Option;
use app\admin\model\Question as QuestionModel;
use app\admin\model\Question;
use think\App;
use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;

class Investigate extends Controller {

    /* 声明调查模型 */
    protected $investigate_model;

    /* 声明问题模型 */
    protected $question_model;

    /* 声明选项模型 */
    protected $option_model;

    /* 声明调查分页器 */
    protected $investigate_page;

    /* 声明调查默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->investigate_model = new InvestigateModel();
        $this->question_model = new QuestionModel();
        $this->option_model = new OptionModel();
        $this->investigate_page = config('page.pagination');
    }

    /* 问卷调查列表 */
    public function index() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $publisher = $this->request->param('publisher');
        $type = $this->request->param('type');
        $status = $this->request->param('status');
        $publish_start = $this->request->param('publish_start');
        $publish_end = $this->request->param('publish_end');
        $page_size = $this->request->param('page_size', $this->investigate_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page', $this->investigate_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'publisher'     => $publisher,
            'type'          => $type,
            'status'        => $status,
            'publisher_start'=> $publish_start,
            'publisher_end' => $publish_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Investigate.index');

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
        if ($publisher) {
            $conditions[] = ['publisher', 'like', '%' . $publisher . '%'];
        }
        if ($type) {
            $conditions[] = ['type', '=', $type];
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
        if ($publish_start && $publish_end) {
            $conditions[] = ['create_time', 'between time', [$publish_start, $publish_end]];
        }

        //返回结果
        $investigate = $this->investigate_model
            ->where($conditions)
            ->order('id', 'desc')
            ->field('id, title, status, create_time as publish_time, publisher')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($investigate) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $investigate
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败,数据不存在'
            ]);
        }
    }

    /* 问卷调查添加更新 */
    public function save() {

        //接收客户端提交过来的数据
        $id = $this->request->param('id');
        $title = $this->request->param('title');
        $type = $this->request->param('type');
        $status = $this->request->param('status', 1);
        $publisher = session('admin.mobile');
        $questions = $this->request->param('question/a');
        $options = $this->request->param('option/a');

        //验证数据
        $validate_data = [
            'id'        => $id,
            'title'     => $title,
            'type'      => $type,
            'status'    => $status,
            'publisher' => $publisher,
            'questions'  => $questions,
            'options'    => $options
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Investigate.save');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 添加问题列表 */
        $question_list = array();
        foreach ($questions as $key => $question) {
            $question_list[$key]['content'] = $question;
        }

        /* 添加选项列表 */
        $option_list = array();
        foreach ($options as $key => $option) {
            $option_list[$key]['content'] = $option;
        }

        $investigate = null;
        $question_result = null;
        $option_result = null;

        if (empty($id) || is_null($id)) {

            $insert_data = [
                'id'         => $id,
                'title'      => $title,
                'status'     => $status,
                'type'       => $type,
                'publisher'  => $publisher,
                'create_time'=> date('Y-m-d H:i:s', time())
            ];
            $investigate = $this->investigate_model->insertGetId($insert_data);
            $investigate_instance = $this->investigate_model->where('id', $investigate)->find();
            $investigate_result = $investigate_instance->Question()->saveAll($question_list);
            $question_instances = Question::all([1,2,3,4]);
            foreach ($question_instances as $key => $question_instance) {
                $question_result = $question_instance->Option()->saveAll($option_list);
            }

        } else {
            $investigate_result = $this->investigate_model->save($validate_data, ['id' => $id]);
        }

        if ($investigate_result) {
            return json([
                'code'      => '200',
                'message'   => '数据操作成功'
            ]);
        } else {
            return json([
                'code'      => '401',
                'message'   => '数据操作失败'
            ]);
        }

    }

    /* 问卷调查详情 */
    public function detail() {

        //获取客户端提交过来的数据
        $id = $this->request->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Investigate.detail');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $investigate = $this->investigate_model->where('id', $id)->find();

        if ($investigate) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $investigate
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败，数据不存在'
            ]);
        }
    }

    /* 问卷调查删除 */
    public function delete() {

        //获取客户端提交来的数据
        $id = $this->request->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Investigate.delete');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        try {
            $questions = $this->question_model->where('investigate_id', $id)->select();
            $question_list = [];
            foreach ($questions as $key => $question) {
                $question_list['question_id'] = $question['id'];
            }

            $option = $this->option_model->where('question_id', 'in', $question_list)->delete();
            $question = $this->question_model->where('investigate_id', $id)->delete();//返回结果
            $investigate = $this->investigate_model->where('id', $id)->delete();
        } catch (DataNotFoundException $e) {
        } catch (ModelNotFoundException $e) {
        } catch (DbException $e) {
            return json([
                'code'      => '404',
                'message'   => '出现错误'.$e
            ]);
        }

        if ($question && $option && $investigate) {
            return json([
                'code'      => '200',
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '删除数据失败'
            ]);
        }

    }

    /* 问卷调查反馈 */
    public function feedback() {

    }
}