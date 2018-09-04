<?php

namespace app\index\model;

use think\Model;

class Development extends BasisModel
{
    protected $table = 'tb_development';

    public function getDateTimeAttr($value)
    {
        $date = date('Y-m-d', strtotime($value));
        return $date;
    }

//    public function setDateTimeAttr($value)
//    {
//
//    }

}
