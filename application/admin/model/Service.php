<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 13:24
 * Comment: 服务商模型
 */

namespace app\admin\model;

class Service extends BaseModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据表 */
    protected $table = 'tb_service';

    /* 关联的分组表 */
    public function group() {
        return $this->belongsTo('Group', 'group_id','id');
    }
}