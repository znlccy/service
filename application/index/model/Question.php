<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 10:18
 * Comment: 问题模型
 */

namespace app\index\model;

class Question extends BasisModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的表 */
    protected $table = 'tb_question';

    /* 关联的表 */
    public function investigate() {
        return $this->belongsTo('Investigate', 'investigate_id', 'id');
    }

    /* 关联的表 */
    public function option() {
        return $this->hasMany('Option', 'question_id', 'id');
    }

    public function setAnswerAttr($value) {
        return json_encode($value);
    }

    public function getAnswerAttr($value) {
        return json_decode($value, true);
    }
}