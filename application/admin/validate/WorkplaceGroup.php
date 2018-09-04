<?php

namespace app\admin\validate;

use think\Validate;

class WorkplaceGroup extends Validate
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
        'name' => 'require|max:50'
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
        'name' => '公司名称'
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

}
