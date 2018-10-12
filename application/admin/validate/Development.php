<?php

namespace app\admin\validate;

use think\Validate;

class Development extends Validate
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
        'id'            => 'number',
        'enter_team_id' => 'require|number',
        'description'   => 'require',
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
        'enter_team_id' => '入驻团队id',
        'description'   => '描述',
    ];

    //验证场景
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'enter_team_id'])
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
