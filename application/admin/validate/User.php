<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 20:00
 * Comment: 用户验证器
 */

namespace app\admin\validate;

class User extends BaseValidate {

    //验证规则
    protected $rule = [
        'page_size'     => 'number',
        'jump_page'     => 'number',
        'id'            => 'number',
        'status'        => 'number',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'login_start'   => 'date',
        'login_end'     => 'date',
        'mobile'        => 'require|regex:phone|length:11|unique:tb_user',
        'password'      => 'alphaDash|length:8,25',
        'confirm_pass'  => 'alphaDash|length:8,25|confirm:password',
        'username'      => 'max:50',
        'email'         => 'email',
        'company'       => 'max:80',
        'career'        => 'max:120',
        'occupation'    => 'max:200',
    ];

    //验证领域
    protected $field = [
        'page_size'     => '每页显示多少条数据',
        'jump_page'     => '跳转至第几页',
        'id'            => '用户主键',
        'status'        => '用户状态',
        'create_start'  => '创建起始时间',
        'create_end'    => '创建截止时间',
        'login_start'   => '登录起始时间',
        'login_end'     => '登录截止时间',
        'mobile'        => '手机号',
        'password'      => '密码',
        'confirm_pass'  => '确认密码',
    ];

    //验证场景
    public function sceneUserList()
    {
       return $this->only(['page_size', 'jump_page', 'id', 'status', 'create_start', 'create_end', 'login_start', 'login_end']);
    }

    public function sceneCreate()
    {
        return $this->only(['mobile', 'password', 'confirm_pass', 'username', 'email', 'company', 'career', 'occupation'])
            ->append('password', 'require')
            ->append('confirm_pass', 'require')
            ->append('username', 'require')
            ->append('email', 'require')
            ->append('company', 'require')
            ->append('career', 'require')
            ->append('occupation', 'require');
    }

    public function sceneUpdate()
    {
        return $this->only(['id','mobile', 'password', 'confirm_pass', 'username', 'email', 'company', 'career', 'occupation'])
            ->append('id', 'require')
            ->append('password', 'require')
            ->append('confirm_pass', 'require');
    }

    public function sceneDetail()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneDelete()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }
}