<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 16:03
 * Comment: 分组模型
 */

namespace app\index\model;

class Group extends BasisModel {

    /* 自动写入和读取时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据表 */
    protected $table = 'tb_group';

}