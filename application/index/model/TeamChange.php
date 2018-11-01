<?php

namespace app\index\model;

use think\Model;

class TeamChange extends Model
{
    protected $table = 'tb_team_change';

    public function setBeforeChangeAttr($value)
    {
        return json_encode($value, JSON_FORCE_OBJECT);
    }

    public function getBeforeChangeAttr($value)
    {
        return json_decode($value);
    }

    public function setAfterChangeAttr($value)
    {
        return json_encode($value, JSON_FORCE_OBJECT);
    }
    public function getAfterChangeAttr($value)
    {
        return json_decode($value);
    }

}
