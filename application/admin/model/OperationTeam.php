<?php

namespace app\admin\model;

use think\Model;

class OperationTeam extends BaseModel
{
    protected $table = 'tb_operation_team';

    /**
     * 关联用户
     * @return \think\model\relation\hasMany
     */
    public function users() {
        return $this->hasMany('Admin',  'operation_team_id', 'id');
    }

    /**
     * 关联角色
     * @return \think\model\relation\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany('Role', 'tb_operation_team_roles', 'role_id','operation_team_id');
    }

    /**
     * 关联用户(负责人)
     * @return \think\model\relation\HasOne
     */
    public function leader() {
        return $this->hasOne('Admin', 'id', 'leader_id');
    }

    /**
     * 关联空间
     * @return \think\model\relation\BelongsTo
     */
    public function space()
    {
        return $this->belongsTo('Space', 'id', 'operation_team_id');
    }

}
