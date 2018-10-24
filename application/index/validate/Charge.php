<?php

namespace app\index\validate;

use think\Validate;

class Charge extends Validate
{
    /* 验证规则 */
    protected $rule = [
        'id'        => 'number',
        'page_size' => 'number',
        'jump_page' => 'number',
        'order_no'  => 'require',
        'order_type' => 'require|number',
        'channel_order_no' => 'require',
        'charge_type' => 'number',
        'operator_id' => 'number',
        'status' => 'number',
        'charge_time' => 'date'
    ];

    /* 验证字段 */
    protected $field = [
        'id'        => '咨询主键',
        'page_size' => '分页大小',
        'jump_page' => '跳转页',
        'order_no'  => '订单号',
        'order_type' => '订单类型',
        'channel_order_no' => '渠道单号',
        'charge_type' => '支付方式',
        'operator_id' => '经手人',
        'status' => '状态',
        'charge_time' => '支付时间'
    ];

    /* 验证场景 */
    public function sceneIndex() {
        return $this->only(['page_size','jump_page'])
            ->remove('id', 'require');
    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require|number');
    }
}
