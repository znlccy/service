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
}
