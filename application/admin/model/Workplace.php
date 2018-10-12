<?php

namespace app\admin\model;

use think\Model;

class Workplace extends BaseModel
{
    protected $table = 'tb_workplace';

    public function workplaceGroup()
    {
        return $this->hasOne('WorkplaceGroup', 'id', 'group_id')->field('id,name');
    }

    public function space()
    {
		return $this->hasOne('Space', 'id', 'space_id')->field('id,name,address');
    }

    public function enterTeam()
    {
        return $this->hasOne('EnterTeam', 'id', 'enter_team_id')->field('id,company');
    }

}
