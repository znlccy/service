<?php

namespace app\admin\validate;

use think\Validate;

class Order extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'page_size' => 'number',
        'jump_page' => 'number',
        'order_no' => 'require|max:20',
        'team_id' => 'require|number',
        'contract_template_no' => 'require|max:20',
        'contract_years' => 'require',
        'pay_type' => 'require|number',
        'deposit' => 'require|number',
        'discount' => 'number',
        'remark' => 'require|max:255',
        'total_price' => 'require|number',
        'operator_id' => 'require|number',
        'status' => 'require|number',
        'invoice_no' => 'require|max:20',
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'id' => '主键id',
        'order_no' => '订单编号',
        'team_id' => '团队id',
        'contract_template_no' => '合同模板编号',
        'contract_years' => '合同年限',
        'pay_type' => '支付方式',
        'deposit' => '定金',
        'discount' => '折扣',
        'remark' => '备注',
        'total_price' => '总计金额',
        'operator_id' => '创建人',
        'status' => '状态',
        'invoice_no' => '发票编号',
    ];

    // 验证场景
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'order_no', 'status'])
            ->remove('order_no', 'require')
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

    public function sceneCheck()
    {
        return $this->only(['order_no', 'status']);
    }
}
