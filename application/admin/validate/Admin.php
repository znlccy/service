<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 19:26
 * Comment: 管理员验证器
 */

namespace app\admin\validate;

class Admin extends BaseValidate {
    protected $table = 'tb_admin';

    //手机验证正则表达式
//    protected $regex = [ 'mobile' => '/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(166)|(19([8,9]))|(18[0,5-9]))\d{8}$/'];

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'mobile'        => 'requireCallback:id_null|length:11|mobile',
        'code'          => 'length:6|number',
        'password'      => 'requireCallback:id_null|alphaDash|length:8,25',
        'username'      => 'max:60|alphaDash',
        'confirm_pass'  => 'alphaDash|length:8,25|confirm:password',
        'real_name'     => 'max:40',
        'status'        => 'number',
        'role_id'       => 'array',
        'page_size'     => 'number',
        'jump_page'     => 'number',
        'register_start'=> 'date',
        'register_end'  => 'date',
        'login_start'   => 'date',
        'login_end'     => 'date',
        'login_ip'      => 'max:120',
        'create_ip'     => 'max:120',
        'operation_team_id' => 'require|number',
        'department_id' => 'require|number',
    ];

    //验证消息
    protected $message = [

    ];

    //验证领域
    protected $field = [
        'id'            => '管理员Id',
        'mobile'        => '手机号码',
        'code'          => '短信验证码',
        'password'      => '用户密码',
        'username'      => '用户名',
        'confirm_pass'  => '确认密码',
        'real_name'     => '真实姓名',
        'status'        => '用户状态',
        'role_id'       => '角色主键',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页',
        'register_start'=> '注册开始日期',
        'register_end'  => '注册结束日期',
        'login_start'   => '登录开始日期',
        'login_end'     => '登录结束日期',
        'login_ip'      => '登录ip',
        'create_ip'     => '创建ip',
        'operation_team_id' => '运营团队id',
        'department_id' => '部门id',
    ];

    //验证场景
    public function sceneMobileLogin()
    {
        return $this->only(['mobile', 'code'])
            ->append('mobile', 'require')
            ->append('code', 'require');
    }

    public function sceneAccountLogin()
    {
        return $this->only(['mobile', 'password'])
            ->append('mobile', 'require')
            ->append('password', 'require');
    }

    public function sceneAdminList()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'status', 'real_name', 'register_start', 'register_end', 'login_start', 'login_end', 'login_ip', 'create_ip', 'operation_team_id', 'department_id'])
            ->append('real_name', 'min:0')
            ->remove('operation_team_id', 'require')
            ->remove('department_id', 'require');
    }

    public function sceneDetail()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneChangePassword()
    {
        return $this->only(['password', 'confirm_pass'])
            ->append('password', 'require')
            ->append('confirm_pass', 'require');
    }
}