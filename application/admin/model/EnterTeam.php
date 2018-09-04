<?php

namespace app\admin\model;

use think\Model;

class EnterTeam extends BaseModel
{
    protected $table = 'tb_enter_team';

    protected $json = ['id_card_pictures'];
}
