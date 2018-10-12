<?php

namespace app\admin\validate;

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
        'page_size'     => 'number',
        'jump_page'     => 'number',
        'id' => 'number',
        'enter_team_id' => 'require|number',
        'project' => 'require|number',
        'before_change' => 'require|array',
        'after_change' => 'require|array',
        'status' => 'require|number',
        'check_user' => 'number',
        'check_time' => 'date'
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'page_size' => '每页数量',
        'jump_page' => '页码',
        'id' => '主键',
        'enter_team_id' => '入驻团队id',
        'project' => '变更项目',
        'before_change' => '变更前数据',
        'after_change' => '变更后数据',
        'status' => '状态',
        'check_user' => '审核人',
        'check_time' => '审核时间'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'status'])
            ->remove('status', 'require');
    }

    public function sceneDetail()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneCheck()
    {
        return $this->only(['id', 'status', 'check_user', 'check_time'])
            ->append('id', 'require')
            ->append('check_user', 'require')
            ->append('check_time', 'require');
    }
}
