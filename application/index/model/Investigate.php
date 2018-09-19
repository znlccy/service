<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18
 * Time: 16:14
 * Comment: 问卷调查模型
 */
namespace app\index\model;

class Investigate extends BasisModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据表 */
    protected $table = 'tb_investigate';

    /* 对应的表 */
    public function question() {
        return $this->hasMany('Question','investigate_id','id');
    }
}