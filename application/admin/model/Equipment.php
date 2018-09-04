<?php

namespace app\admin\model;

use think\Model;

class Equipment extends BaseModel
{
    protected $table = 'tb_equipment';

    public function type()
    {
        return $this->hasOne('Equipment', 'id', 'type_id');
    }

    public function space()
    {
        return $this->hasOne('Space', 'id', 'space_id');
    }
}
