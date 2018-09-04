<?php

namespace app\admin\model;

use think\Model;

class Venue extends BaseModel
{
    protected $table = 'tb_venue';

    /**
     * @return \think\model\relation\HasOne
     */
    public function space()
    {
        return $this->hasOne('Space', 'id', 'space_id');
    }

    /**
     * @return \think\model\relation\HasMany
     */
    public function reservations()
    {
        return $this->hasMany('Reservation','venue_id', 'id');
    }
}
