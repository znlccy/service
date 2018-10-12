<?php

namespace app\admin\model;

use think\Model;

class IncidentalOrder extends BaseModel
{
    protected $table = 'tb_incidental_order';

    public function team()
    {
        return $this->hasOne('EnterTeam', 'id', 'team_id')->field('id,company');
    }

    public function invoice()
    {
        return $this->belongsTo('Invoice', 'id', 'rec_order_id')->field('id,rec_order_id,invoice_no');
    }
}
