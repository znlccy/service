<?php

namespace app\admin\model;

use think\Model;

class DepartmentUser extends BaseModel
{
    protected $table = 'tb_department_user';

    public function user()
    {
        return $this->hasOne('Admin', 'id', 'user_id')->field('id,nickname');
    }

    public function department()
    {
        return $this->hasOne('Department', 'id', 'department_id');
    }
}
