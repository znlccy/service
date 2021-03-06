<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/8
 * Time: 18:48
 * Comment: 管理员模型
 */
namespace app\admin\model;
use think\Model;
class Admin extends BaseModel {
    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_admin';
    /**
     * 关联的中间表
     * @return \think\model\relation\BelongsToMany
     */
    public function role() {
        return $this->belongsToMany('Role', 'tb_admin_role', 'role_id','user_id');
    }
    /**
     *  关联运营团队
     * @return \think\model\relation\BelongsTo
     */
    public function operationTeam() {
        return $this->hasOne('OperationTeam', 'id', 'operation_team_id');
    }
    /**
     * 关联部门
     * @return \think\model\relation\HasOne
     */
    public function department() {
        return $this->hasOne('Department', 'id', 'department_id')->field('id,name');
    }
    /**
     * 所属空间
     */
    public function space() {
        return $this->belongsTo('Space', 'operation_team_id', 'operation_team_id')->field('id,name');
    }
}