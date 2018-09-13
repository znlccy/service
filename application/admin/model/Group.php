<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 13:28
 * Comment: 服务商分组
 */

namespace app\admin\model;

class Group extends BaseModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据表 */
    protected $table = 'tb_group';

    /* 关联的服务表 */
    public function service() {
        return $this->hasMany('Service', 'group_id', 'id');
    }
}