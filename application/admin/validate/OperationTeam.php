<?php

namespace app\admin\validate;

use think\Validate;

class OperationTeam extends Validate
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
        'name' => 'require|max:50',
        'leader_id' => 'number',
        'description' => 'require|max:255',
        'management_type' => 'number',
        'operation_team_id' => 'number',
        'user_id' => 'number',
        'role_id' => 'number',
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
        'name' => '名称',
        'leader_id' => '负责人',
        'description' => '描述',
        'management_type' => '运营模式',
        'operation_team_id' => '运营团队id',
        'status' => '状态'
    ];

    /**
     * 定义验证场景
     *
     */
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'name'])
            ->remove('name', 'require');
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

    public function sceneDeleteUser()
    {
        return $this->only(['operation_team_id','user_id'])
            ->append('operation_team_id', 'require')
            ->append('user_id', 'require');
    }

    public function sceneDeleteRole()
    {
        return $this->only(['operation_team_id','role_id'])
            ->append('operation_team_id', 'require')
            ->append('role_id', 'require');
    }

    public function sceneLeader()
    {
        return $this->only(['operation_team_id']);
    }
}
