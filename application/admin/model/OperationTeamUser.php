<?php

namespace app\admin\model;

use think\Model;

class OperationTeamUser extends BaseModel
{
    protected $table = 'tb_operation_team_users';

    public function user()
    {
        return $this->hasOne('OtUser', 'id', 'user_id');
    }

    public function team()
    {
        return $this->hasOne('OperationTeam', 'id', 'operation_team_id');
    }
}
