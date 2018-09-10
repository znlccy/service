<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/4
 * Time: 18:52
 * Comment: 政策控制器
 */

namespace app\admin\controller;

use think\App;
use app\admin\model\ConsultPolicy as ConsultPolicyModel;
use app\admin\validate\Policy as PolicyValidate;

class Policy extends BaseController {

    /* 声明咨询政策模型 */
    protected $consult_policy_model;

    /* 声明咨询验证器 */
    protected $policy_validate;

    /* 声明咨询分页 */
    protected $policy_page;

    /* 默认构造函数 */
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->consult_policy_model = new ConsultPolicyModel();
        $this->policy_validate = new PolicyValidate();
        $this->policy_page = config('page.pagination');
    }


    /* 咨询管理列表api接口 */
    public function index() {

        //获取客户端提交过来的数据
        $id = request()->param('id');
        $title = request()->param('title');
        $content = request()->param('content');
        $create_start = request()->param('create_start');
        $create_end = request()->param('create_end');
        $update_start = request()->param('update_start');
        $update_end = request()->param('update_end');
        $status = request()->param('status');
        $publisher = session('admin.mobile');
        $page_size = request()->param('page_size/d',$this->policy_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page/d',$this->policy_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'content'       => $content,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'status'        => $status,
            'publisher'     => $publisher,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Policy.index');
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
        if ($content) {
            $conditions[] = ['content', 'like', '%'  . $content . '%'];
        }
        if ($create_start && $create_end) {
            $conditions[] = ['create_time', 'between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions[] = ['update_time', 'between time', [$update_start, $update_end]];
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
        if ($publisher) {
            $conditions[] = ['publisher', 'like', '%' . $publisher . '%'];
        }

        //返回数据
        $consult_entry = $this->consult_policy_model
            ->where('type_id = 2')
            ->order('id', 'desc')
            ->where($conditions)
            ->field('id,title,content,status,publisher,create_time,update_time')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($consult_entry) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $consult_entry
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败，数据不存在',
            ]);
        }
    }

    /* 咨询管理添加更新api接口 */
    public function save() {
        //接收客户端提交过来的数据
        $id = request()->param('id');
        $title = request()->param('title');
        $content = request()->param('content');
        $status = request()->param('status', 1);
        $type_id = 2;
        $publisher = session('admin.mobile');

        //验证数据
        $validate_data = [
            'id'        => $id,
            'title'     => $title,
            'content'   => $content,
            'status'    => $status,
            'type_id'   => $type_id,
            'publisher' => $publisher
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Policy.save');
        if(true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //判断更新还是添加
        if (empty($id)) {
            $operation = $this->consult_policy_model->save($validate_data);
        } else {
            $operation = $this->consult_policy_model->save($validate_data, ['id' => $id]);
        }

        if ($operation) {
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

    /* 咨询管理详情api接口 */
    public function detail() {

        //接收客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Policy.detail');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $consult = $this->consult_policy_model
            ->where('id', $id)
            ->where('type_id = 2')
            ->field('id,title,content,status,publisher,create_time,update_time')
            ->find();
        if ($consult) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $consult
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败，数据库中不存在',
            ]);
        }
    }

    /* 咨询管理删除api接口 */
    public function delete() {
        //接收客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->validate($validate_data, 'Policy.delete');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        //返回结果
        $consult = $this->consult_policy_model
            ->where('id', $id)
            ->where('type_id = 2')
            ->delete();
        if ($consult) {
            return json([
                'code'      => '200',
                'message'   => '删除信息成功'
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '删除信息失败，数据库中不存在',
            ]);
        }
    }

}