<?php

namespace app\admin\model;

use think\Model;

class Incidental extends BaseModel
{
    protected $table = 'tb_incidental';

    public function operator()
    {
        return $this->hasOne('Admin', 'id', 'operator_id')->field('id,nickname');
    }
}
