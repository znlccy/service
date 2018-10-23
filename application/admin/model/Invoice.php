<?php

namespace app\admin\model;

use think\Model;

class Invoice extends BaseModel
{
    protected $table = 'tb_invoice';

    public function opener()
    {
        return $this->hasOne('Admin', 'id', 'opener_id')->field('id,nickname');
    }
    public function getRecOrderIdAttr($value,$data)
    {
        if ($data['order_type'] === 1) {
            $order_no = RecOrder::where('id', $value)->value('order_no');
        } else {
            $order_no = IncidentalOrder::where('id', $value)->value('order_no');
        }
        return $order_no;
    }
}
