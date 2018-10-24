<?php

namespace app\index\model;

use think\Model;

class RecOrder extends BasisModel
{
    protected $table = 'tb_rec_order';

    public function invoice()
    {
        return $this->belongsTo('Invoice','id', 'rec_order_id')->field('id,rec_order_id,status,invoice_no');
    }
}
