<?php

namespace app\index\model;

use think\Model;

class EnterTeam extends BasisModel
{
    protected $table = 'tb_enter_team';

    protected $json = ['id_card_pictures'];

    /**
     * @return \think\model\relation\HasOne
     */
    public function linkman()
    {
        return $this->hasOne('Linkman', 'enter_team_id', 'id');
    }

    /**
     * @return \think\model\relation\HasMany
     */
    public function members()
    {
        return $this->hasMany('EnterTeamMember', 'enter_team_id', 'id');
    }

    /**
     * @return \think\model\relation\HasMany
     */
    public function developments()
    {
        return $this->hasMany('Development', 'enter_team_id', 'id');
    }

}
