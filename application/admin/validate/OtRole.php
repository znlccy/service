<?php

namespace app\admin\validate;

use think\Validate;

class OtRole extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'page_size'     => 'require|number',
        'jump_page'     => 'require|number',
        'id' => 'require|number',
        'name' => 'require',
        'description' => 'require',
        'type' => 'require|number'
    ];
    
    /**
     * 定义字段中文含义
     * 格式：'字段名'	=>	'中文含义'
     *
     * @var array
     */	
    protected $field = [
        'page_size'     => '每页数量',
        'jump_page'     => '页码',
        'name' => '角色名称',
        'description' => '角色描述',
        'type' => '角色类型'
    ];

    /**
     * 定义验证场景
     *
     * @var array
     */
    protected $scene = [
        'index' => ['page_size', 'jump_page', 'id|number', 'type|number'],
        'save' => ['id|number', 'name', 'description', 'type'],
        'detail' => ['id'],
        'delete' => ['id']
    ];
}
