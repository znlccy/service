<?php

namespace app\admin\model;

use think\Model;

class HistoryTemplate extends BaseModel
{
    protected $table = 'tb_history_template';

    public function editor()
    {
        return $this->hasOne('Admin', 'id', 'editor')->field('id,nickname');
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
