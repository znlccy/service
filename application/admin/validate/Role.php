<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 19:49
 * Comment: 角色验证器
 */

namespace app\admin\validate;

class Role extends BaseValidate
{

    //验证规则
    protected $rule = [
        'page_size'         => 'number',
        'jump_page'         => 'number',
        'id'                => 'number',
        'status'            => 'number',
        'name'              => 'max:50',
        'active_start'      => 'date',
        'active_end'        => 'date',
        'description'       => 'max:120',
        'sort_num'          => 'number',
        'permission_id'     => 'array',
        'type'              => 'require|number',
        'operation_team_id' => 'require|number',
    ];

    //验证消息
    protected $field = [
        'page_size'   => '每页显示多少条',
        'jump_page'   => '跳转到第几页',
        'id'          => '角色主键',
        'name'        => '角色名称',
        'description' => '角色描述',
        'status'      => '角色状态',
        'sort_num'    => '角色排序',
        'permission_id'    => '权限主键',
        'type'        => '角色类型',
        'operation_team_id' => '运营团队id'
    ];

    //验证场景
    public function sceneRoleList()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'status', 'name', 'active_start', 'active_end', 'operation_team_id'])
            ->remove('operation_team_id', 'require');
    }

    public function sceneAdd()
    {
        return $this->only(['id', 'name', 'description', 'status', 'sort_num', 'type', 'operation_team_id'])
            ->append('name', 'require')
            ->append('description', 'require')
            ->append('status', 'require')
            ->append('sort_num', 'require');
    }

    public function sceneDelete()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneDetail()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneAssignRolePermission()
    {
        return $this->only(['id', 'permission_id'])
            ->append('id', 'require')
            ->append('permission_id', 'require');
    }

    public function sceneGetRolePermission()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

}
