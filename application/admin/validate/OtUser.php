<?php

namespace app\admin\validate;

use think\Validate;

class OtUser extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'page_size'     => '每页数量',
        'jump_page'     => '页码',
        'id' => 'require|number',
        'name' => 'require',
        'mobile' => 'require|number|length:11',
        'email' => 'require|email',
        'role_id' => 'require|number',
    ];

    /**
     * 定义字段中文含义
     * 格式：'字段名'	=>	'中文含义'
     *
     * @var array
     */
    protected $field = [
        'name' => '角色名称',
        'mobile' => '手机号',
        'email' => '邮箱',
        'role_id' => '角色id',
    ];

    /**
     * 定义验证场景
     *
     * @var array
     */
    protected $scene = [
        'index' => ['page_size', 'jump_page', 'id|number', 'role_id|number'],
        'save' => ['id|number', 'name', 'mobile', 'email', 'role_id'],
        'detail' => ['id'],
        'delete' => ['id']
    ];
}
