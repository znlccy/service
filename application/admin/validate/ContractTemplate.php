<?php

namespace app\admin\validate;

use think\Validate;

class ContractTemplate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'name' => 'require|max:50',
        'remark' => 'require',
        'rich_text' => 'require',
        'content' => 'array',
        'template_no' => 'require|unique:tb_contract_template',
        'operator_id' => 'require|number',
        'status' => 'require|number',
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'id' => '主键id',
        'name' => '名称',
        'remark' => '备注',
        'rich_text' => '富文本',
        'template_no' => '模板ID',
        'operator_id' => '创建人',
        'status' => '状态',
    ];

    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'name', 'status'])
            ->remove('name', 'require')
            ->remove('status', 'require');
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
