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
        return $this->hasOne('OperationTeam', 'id')->field('id,name');
    }

    /**
     *  关联省份
     */
    public function province()
    {
        return $this->hasOne('Area', 'id', 'province_id')->field('id,name');
    }

    /**
     *  关联城市
     */
    public function city()
    {
        return $this->hasOne('Area', 'id', 'city_id')->field('id,name');
    }

    /**
     * 关联区县
     */
    public function district()
    {
        return $this->hasOne('Area', 'id', 'district_id')->field('id,name');
    }
}
