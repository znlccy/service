<?php

namespace app\admin\validate;

use think\Validate;

class OrderWorkplace extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'order_id' => 'require|number',
        'workplace_id' => 'require|number',
        'workplace_area' => 'float',
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'order_id' => '订单id',
        'workplace_id' => '工位id',
        'workplace_area' => '工位面积',
    ];

    //验证场景
    protected $scene = [

    ];
}
