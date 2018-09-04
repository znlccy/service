<?php

namespace app\admin\model;

use think\Model;

class OtUser extends BaseModel
{
    protected $table = 'tb_ot_user';
    public function role()
    {
        return $this->hasOne('OtRole', 'id', 'role_id');
    }
}
