<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 18:21
 * Comment: 服务商控制器
 */

namespace app\admin\model;

class Facilitator extends BaseModel {

    /* 自动写入读取时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 关联的数据表 */
    protected $table = 'tb_facilitator';
}