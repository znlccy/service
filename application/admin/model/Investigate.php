<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10
 * Time: 16:47
 * Comment：问卷调查模型
 */

namespace app\admin\model;

class Investigate extends BaseModel {

    /* 声明自动写入读取时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 声明关联的表 */
    protected $table = 'tb_investigate';

    /* 关联的数据表 */
    public function question() {
        return $this->hasMany('Question', 'investigate_id', 'id');
    }
}