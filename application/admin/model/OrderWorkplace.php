<?php

namespace app\admin\model;

use think\Model;

class OrderWorkplace extends BaseModel
{
    protected $table = 'tb_order_workplace';

    /**
     * @return BaseModel|\think\model\relation\HasOne
     * 关联订单
     */
    public function order()
    {
        return $this->hasOne('Order','id', 'order_id');
    }

    public function workplace()
    {
        return $this->hasOne('Workplace', 'id', 'workplace_id');
    }
}
