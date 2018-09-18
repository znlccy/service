<?php

namespace app\admin\model;

use think\Model;

class OrderCopy extends BaseModel
{
    protected $table = 'tb_order_copy';

    public function order()
    {
        return $this->hasOne('order', 'id', 'order_id');
    }

    public function user()
    {
        return $this->hasOne('Admin', 'id', 'user_id');
    }
}
