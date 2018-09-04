<?php

namespace app\admin\validate;

use think\Validate;

class Contract extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'page_size' => 'number',
        'jump_page' => 'number',
        'contract_no' => 'require|max:20',
        'order_no' => 'require',
        'contract_template_no' => 'require',
        'operator_id' => 'require|number',
        'custom_content' => 'require',
        'status' => 'require|number',
        'effective_time' => 'require|date',
        'failure_time' => 'require|date',
        'sign_date' => 'date',
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
        'contract_no' => '合同编号',
        'order_no' => '合同关联的订单编号',
        'contract_template_no' => '合同关联的模板编号',
        'custom_content' => '合同自定义列表',
        'operator_id' => '创建者',
        'status' => '状态',
        'effective_time' => '生效时间',
        'failure_time' => '过期时间',
        'sign_date' => '签署日期'
    ];

    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'contract_no', 'status'])
            ->remove('contract_no', 'require')
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

    public function sceneDownload()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneSigning()
    {
        return $this->only(['id', 'sign_date'])
            ->append('id', 'require');
    }

}
