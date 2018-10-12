<?php

namespace app\admin\model;

use think\Model;

class TeamChange extends BaseModel
{
    protected $table = 'tb_team_change';

    public function team(){
        return $this->hasOne('EnterTeam', 'id', 'enter_team_id')->field('id,company');
    }

    public function user(){
        return $this->hasOne('Admin', 'id', 'check_user');
    }

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
