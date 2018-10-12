<?php

namespace app\admin\model;

use think\Model;

class RecOrder extends BaseModel
{
    protected $table = 'tb_rec_order';

    public function invoice()
    {
        return $this->belongsTo('Invoice','id', 'rec_order_id')->field('id,rec_order_id,status,invoice_no');
    }

    public function team()
    {
        return $this->hasOne('EnterTeam', 'id', 'team_id')->field('id,company');
    }
}
