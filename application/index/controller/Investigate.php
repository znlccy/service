<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 10:49
 * Comment: 问卷调查
 */

namespace app\index\controller;

use app\index\model\Investigate as InvestigateModel;
use app\index\model\Question as QuestionModel;
use app\index\model\Option as OptionModel;
use think\App;
use think\Controller;
use think\Db;
use think\Exception;

class Investigate extends Controller {

    /* 声明调查模型 */
    protected $investigate_model;

    /* 声明问题模型 */
    protected $question_model;

    /* 声明选项模型 */
    protected $option_model;

    /* 声明调查分页 */
    protected $investigate_page;

    /* 声明默认构造函数 */
    public function __construct(App $app = null) {
        parent::__construct($app);
        $this->investigate_model = new InvestigateModel();
        $this->question_model = new QuestionModel();
        $this->option_model = new OptionModel();
        $this->investigate_page = config('page.pagination');
    }

    /* 首页列表 */
    public function index() {

        /* 接收客户端提交过来的数据 */
        $page_size = $this->request->param('page_size', $this->investigate_page['PAGE_SIZE']);
        $jump_page = $this->request->param('jump_page', $this->investigate_page['JUMP_PAGE']);

        /* 验证数据 */
        $validate_data = [
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Investigate.index');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回数据 */
        $investigate = $this->investigate_model
            ->order('id','desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($investigate) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $investigate
            ]);
        } else {
            return json([
                'code' => '200',
                'message' => '查询数据失败',
                'data' => $investigate
            ]);
        }
    }

    /* 详情接口 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Investigate.detail');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $investigate = $this->investigate_model
            ->with('question',function ($query){
                $query->field('id,content,answer');
            })
            ->where('id', $id)
            ->order('id','desc')
            ->find();

        $option_list = [];
        for ( $i = 0; $i < count($investigate['question']); $i++ ) {
            $option_list[$i] = $this->option_model->where('question_id', '=',$investigate['question'][$i]['id'])->select();
            $investigate['question'][$i]['option'] = $option_list[$i];
        }

        return json([
            'code'      => '200',
            'message'   => '查询数据成功',
            'data'      => $investigate
        ]);
    }

    /* 提交选项 */
    public function submit() {

        /* 接收客户端提交过来的数据 */
        $investigate_id = $this->request->param('investigate_id');
        $answer = $this->request->param('answer');

        /* 验证数据 */
        $validate_data = [
            'investigate_id' => $investigate_id,
            'answer'         => $answer
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Investigate.submit');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回数据 */
        $investigate = $this->investigate_model
            ->where('id',$investigate_id)
            ->with('question', function ($query) {
                $query->field('id,content');
            })
            ->find();

        $this->investigate_model->where('id', $investigate_id)->setInc('count');

        for ( $i = 0; $i < count($investigate['question']); $i++ ) {
            if ($investigate['question'][$i]['type'] == 1) {
                $this->question_model->where('id', $investigate['question'][$i]['id'])->update(['answer' => $answer]);
                $option = $this->option_model->where('id', $answer)->setInc('count');
            }
            if ($investigate['question'][$i]['type'] == 2) {
                $this->question_model->where('id', $investigate['question'][$i]['id'])->update(['answer' => $answer]);
                $option = $this->option_model->where('id', 'in', $answer)->setInc('count');
            }
            if ($investigate['question'][$i]['type'] == 3) {
                $this->question_model->where('id', $investigate['question'][$i]['id'])->update(['answer' => $answer]);
            }
        }

        return json([
            'code'      => '200',
            'message'   => '提交成功'
        ]);
    }

}