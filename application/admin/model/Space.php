<?php

namespace app\admin\model;

use think\Model;

class Space extends BaseModel
{
    protected $table = 'tb_space';

    protected $json = ['space_pictures'];

    public $operation_team_id = 1;

    protected function getEnterRateAttr($value) {
        return $value * 100 . '%';
    }

    public function operationTeam() {
        return $this->hasOne('OperationTeam', 'id', 'operation_team_id');
    }
}
