<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10
 * Time: 19:06
 * Comment: 问题模型
 */

namespace app\admin\model;

class Question extends BaseModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 关联的数据表 */
    protected $table = 'tb_question';

    /* 关联的数据模型 */
    public function investigate() {
        return $this->belongsTo('Investigate', 'investigate_id', 'id');
    }

    /* 关联的数据模型 */
    public function option() {
        return $this->hasMany('Option', 'question_id', 'id');
    }

}