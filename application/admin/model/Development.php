<?php

namespace app\admin\model;

use think\Model;

class Development extends Model
{
    protected $table = 'tb_development';

    public function getDateTimeAttr($value)
    {
        $date = date('Y-m-d', strtotime($value));
        return $date;
    }
}
