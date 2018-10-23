<?php

namespace app\admin\model;

use think\Model;

class EnterTeam extends BaseModel
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

    /**
     * @return \think\model\relation\HasOne
     */
    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id')->field('id,mobile');
    }
}
