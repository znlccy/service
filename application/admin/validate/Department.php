<?php

namespace app\admin\validate;

use think\Validate;

class Department extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'name' => 'require|max:30',
        'p_id' => 'number',
        'description' => 'require',
        'id' => 'number'
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'id' => '部门id',
        'name' => '名称',
        'p_id' => '上级部门',
        'description' => '部门描述'
    ];

    //验证场景
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

    public function sceneMember()
    {
        return $this->only(['id'])
            ->append('id','require');
    }

    public function sceneLeader()
    {
        return $this->only(['id'])
            ->append('id','require');
    }
}
