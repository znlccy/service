<?php

namespace app\admin\validate;

use think\Validate;

class Invoice extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'id' => 'number',
        'sale_order_id' => 'require',
        'rec_order_id' => 'require',
        'invoice_no' => 'require',
        'opener_type' => 'require',
        'invoice_title' => 'require',
        'type' => 'require|number',
        'tax' => 'requireIf:opener_type,2',
        'bank' => 'requireIf:opener_type,2',
        'account' => 'requireIf:opener_type,2',
        'address' => 'requireIf:opener_type,2',
        'phone' => 'requireIf:opener_type,2|regex:phone',
        'status' => 'require|number',
        'opener_id' => 'number',
        'open_time' => 'date'
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'id' => '发票id',
        'invoice_no' => '发票编号',
        'sale_order_id' => '销售订单id',
        'rec_order_id' => '收款订单id',
        'opener_type' => '开具类型',
        'invoice_title' => '发票抬头',
        'type' => '发票类型',
        'tax' => '税务登记号',
        'bank' => '开户银行',
        'account' => '开户账号',
        'address' => '注册场所地址',
        'phone' => '注册固定电话',
        'status' => '发票状态',
        'opener_id' => '开票人',
        'open_time' => '开票时间'
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

    public function sceneOpen()
    {
        return $this->only(['id', 'status', 'opener', 'open_time'])
            ->append('id', 'require')
            ->append('opener_id', 'require')
            ->append('open_time', 'require');
    }
}
