<?php

namespace app\index\model;

use think\Model;

class Invoice extends BasisModel
{
    protected $table = 'tb_invoice';

    public function opener()
    {
        return $this->hasOne('Admin', 'id', 'opener_id')->field('id,nickname');
    }
}
