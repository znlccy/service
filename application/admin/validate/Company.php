<?php

namespace app\admin\validate;

use think\Validate;

class Company extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'page_size'     => 'number',
        'jump_page'     => 'number',
	    'id' => 'require|number',
        'name' => 'require|max:50',
        'profile' => 'require|max:255',
        'address' => 'require|max:100',
        'phone' => 'require|regex:phone',
        'logo' => 'max:80'
    ];
    
    /**
     * 定义字段信息
     * 格式：'字段名'	=>	'中文信息'
     *
     * @var array
     */	
    protected $field = [
        'page_size'     => '每页数量',
        'jump_page'     => '页码',
        'name' => '公司名称',
        'profile' => '公司简介',
        'address' => '公司地址',
        'phone' => '联系电话',
        'logo' => '公司LOGO'
    ];

    /**
     * 定义验证场景
     *
     * @var array
     */
    protected $scene = [
        'index' => ['page_size', 'jump_page', 'id|number', 'name|max', 'phone'],
        'save' => ['id|number', 'name', 'profile', 'address', 'phone', 'logo'],
        'detail' => ['id'],
        'delete' => ['id']
    ];

}
