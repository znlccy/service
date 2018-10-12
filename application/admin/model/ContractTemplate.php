<?php

namespace app\admin\model;

use think\Model;

class ContractTemplate extends BaseModel
{
    protected $table = 'tb_contract_template';

    public function operator()
    {
        return $this->hasOne('Admin', 'id', 'operator_id')->field('id,nickname');
    }

    public function setContentAttr($value)
    {
        return json_encode($value);
    }

    public function getContentAttr($value)
    {
        return json_decode($value, true);
    }
}
