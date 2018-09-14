<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/13
 * Time: 17:21
 * Comment: 反馈模型
 */

namespace app\admin\model;

class Feedback extends BaseModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据模型 */
    protected $table = 'tb_feedback';

    /* 关联的数据表 */
    public function investigate() {
        return $this->belongsTo('Investigate','investigate_id', 'id');
    }
}