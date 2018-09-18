<?php

namespace app\admin\validate;

use think\Validate;

class IncidentalOrder extends Validate
{
    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'id' => '主键id',
        'project' => '收款项目',
        'pay_type' => '收款方式',
        'price' => '金额',
        'team_id' => '收款对象',
        'status' => '状态'
    ];

    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'project' => 'require|max:50',
        'pay_type' => 'require|number',
        'team_id' => 'require|number',
        'price' => 'require|float',
        'status' => 'require|number'
    ];

    //验证场景
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id']);
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
