<?php

namespace app\index\model;

use think\Model;

class TeamChange extends Model
{
    protected $table = 'tb_team_change';

    public function setBeforeChangeAttr($value)
    {
        return json_encode($value);
    }

    public function getBeforeChangeAttr($value)
    {
        return json_decode($value, true);
    }

    public function setAfterChangeAttr($value)
    {
        return json_encode($value);
    }
    public function getAfterChangeAttr($value)
    {
        return json_decode($value, true);
    }

}
