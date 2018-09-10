<?php

namespace app\admin\model;

use think\Model;

class User extends BaseModel
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'tb_user';

    protected $autoWriteTimestamp = 'datetime';

    /* 关联中间表 */
    public function activity() {
        return $this->belongsToMany('Activity', 'tb_user_activity', 'activity_id', 'user_id');
    }
}
