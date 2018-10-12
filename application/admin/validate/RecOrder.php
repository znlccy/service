<?php

namespace app\admin\validate;

use think\Validate;

class RecOrder extends Validate
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
        'sale_order_id' => 'require|number',
        'order_no' => 'require|max:20',
//        'invoice_id' => 'require|max:20',
        'team_id' => 'require|number',
        'price' => 'require|float',
        'status' => 'require|number',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $field = [
        'page_size' => '每页数量',
        'jump_page' => '页码',
        'sale_order_id' => '关联销售订单id',
        'order_no' => '订单编号',
//        'invoice_id' => '发票编号',
        'team_id' => '团队id',
        'price' => '金额',
        'status' => '状态',
    ];

    /**
     * 验证场景
     */
}
