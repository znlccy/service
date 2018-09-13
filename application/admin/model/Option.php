<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10
 * Time: 19:10
 * Comment: 选项模型
 */

namespace app\admin\model;

class Option extends BaseModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 关联的数据表 */
    protected $table = 'tb_option';

    /* 关联的数据模型 */
    public function question() {
        return $this->belongsTo('Question','question_id', 'id');
    }
}