<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 19:48
 * Comment: 权限验证器
 */

namespace app\admin\validate;

class Permission extends BaseValidate
{

    //验证规则
    protected $rule = [
        'id'           => 'number',
        'name'         => 'max:80',
        'status'       => 'number',
        'description'  => 'max:80',
        'path'         => 'max:200',
        'icon'         => 'max:80',
        'sort'         => 'number',
        'level'        => 'number',
        'pid'          => 'number',
        'create_start' => 'date',
        'create_end'   => 'date',
        'page_size'    => 'number',
        'jump_page'    => 'number',
    ];

    //验证领域
    protected $field = [
        'id'           => '权限主键',
        'name'         => '权限名称',
        'status'       => '权限状态',
        'description'  => '权限描述',
        'path'         => '权限路径',
        'icon'         => '权限图标',
        'sort'         => '权限排序',
        'level'        => '权限水平',
        'pid'          => '权限父节点',
        'create_start' => '创建时间',
        'create_end'   => '创建时间',
        'page_size'    => '每页数量',
        'jump_page'    => '页码',
    ];

    //验证场景
    public function sceneAdd()
    {
        return $this->only(['id', 'name', 'status', 'description', 'path', 'icon', 'sort', 'level', 'pid'])
            ->append('name', 'require')
            ->append('status', 'require')
            ->append('description', 'require')
            ->append('path', 'require')
            ->append('icon', 'require')
            ->append('sort', 'require')
            ->append('level', 'require')
            ->append('pid', 'require');
    }
    public function sceneNodeList()
    {
        return $this->only(['id', 'name', 'status', 'description', 'path', 'icon', 'sort', 'level', 'pid', 'page_size', 'jump_page'])
            ->append('page_size', 'number')
            ->append('jump_page', 'number');
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
