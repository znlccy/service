<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 10:18
 * Comment: 选项模型
 */

namespace app\index\model;

class Option extends BasisModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的表 */
    protected $table = 'tb_option';

    /* 关联的表 */
    public function question() {
        return $this->belongsTo('Question', 'question_id', 'id');
    }
}