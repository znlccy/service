<?php

namespace app\admin\model;

use think\Model;

class Reservation extends BaseModel
{
    protected $table = 'tb_reservation';

    protected $type = [
        'date' => 'date'
    ];

    /**
     * @return \think\model\relation\HasOne
     */
    public function team()
    {
        return $this->hasOne('EnterTeam', 'id', 'enter_team_id')->field('id,company');
    }

    public function venue()
    {
        return $this->hasOne('Venue', 'id', 'venue_id');
    }

    public function setReservationTimeAttr($value)
    {
        return json_encode($value);
    }

    public function getReservationTimeAttr($value)
    {
        return json_decode($value, true);
    }

}
