<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 9:40
 * Comment: 政策控制器
 */

namespace app\index\controller;

use think\Request;
use app\index\model\ConsultPolicy as PolicyModel;

class Policy extends BasisController {

    /* 声明政策模型 */
    protected $policy_model;

    /* 声明政策分页 */
    protected $policy_page;

    /* 声明默认 */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->policy_model = new PolicyModel();
        $this->policy_page = config('page.pagination');
    }

    /* 政策列表 */
    public function index() {

        /* 接收客户提交过来的数据 */
        $page_size = $this->request->param('page_size');
        $jump_page = $this->request->param('jump_page');

        /* 验证数据 */
        $validate_data = [
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Policy.index');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $policy = $this->policy_model
            ->where('type = 2')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($policy) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $policy
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败,数据不存在',
            ]);
        }
    }

    /* 政策详情 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Policy.detail');

        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $policy = $this->policy_model
            ->where('id', $id)
            ->find();

        if ($policy) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $policy
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败,数据不存在'
            ]);
        }
    }

}