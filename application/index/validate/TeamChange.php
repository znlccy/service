<?php

namespace app\index\validate;

use think\Validate;

class TeamChange extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'enter_team_id' => 'require|number',
        'project' => 'require|number',
        'before_change' => 'array',
        'after_change' => 'require|array',
        'status' => 'require|number'
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'enter_team_id' => '入驻团队id',
        'project' => '变更项目',
        'before_change' => '变更前数据',
        'after_change' => '变更后数据',
        'status' => '状态'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}
