<?php

namespace app\admin\model;

use think\model\Pivot;

class OperationTeamRole extends Pivot
{
    protected $table = 'tb_operation_team_roles';

    protected $autoWriteTimestamp = 'timestamp';

    public function role()
    {
        return $this->hasOne('Role', 'id', 'role_id');
    }

    public function team()
    {
        return $this->hasOne('OperationTeam', 'id', 'operation_team_id');
    }
}
