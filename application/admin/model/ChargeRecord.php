<?php

namespace app\admin\model;

use think\Model;

class ChargeRecord extends Model
{
    protected $table = 'tb_charge_record';

    public function operator()
    {
        return $this->hasOne('Admin', 'id', 'operator_id')->field('id,nickname');
    }

}
