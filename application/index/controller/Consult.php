<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 9:40
 * Comment: 咨询控制器
 */

namespace app\index\controller;

use think\Request;
use app\index\model\ConsultPolicy as ConsultModel;

class Consult extends BasisController {

    /* 咨询模型 */
    protected $consult_model;

    /* 咨询分页 */
    protected $consult_page;

    /* 默认构造函数 */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->consult_model = new ConsultModel();
        $this->consult_page = config('page.pagination');
    }

    /* 咨询首页 */
    public function index() {

        /* 接收客户端提交过来的数据 */
        $page_size = $this->request->param('page_size');
        $jump_page = $this->request->param('jump_page');

        /* 验证数据 */
        $validate_data = [
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Consult.index');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回数据 */
        $consult = $this->consult_model
            ->where('type = 1')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($consult) {
            return json([
                'code'      => '200',
                'message'   => '查询信息成功',
                'data'      => $consult
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询信息失败,数据不存在',
            ]);
        }

    }
    
    /* 咨询详情 */
    public function detail() {

        /* 接收客户端提交过来的数据 */
        $id = $this->request->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id
        ];

        /* 验证结果 */
        $result = $this->validate($validate_data, 'Consult.detail');
        if (true !== $result) {
            return json([
                'code'      => '401',
                'message'   => $result
            ]);
        }

        /* 返回结果 */
        $consult  = $this->consult_model
            ->where('id', $id)
            ->find();

        if ($consult) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $consult
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询失败，数据不存在'
            ]);
        }
    }
}