<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 10:00
 * Comment: 活动模型
 */

namespace app\index\model;

class Service extends BasisModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据表 */
    protected $table = 'tb_service';

    /* 设置富文本区域 */
    public function setTextAttr($value) {
        return htmlspecialchars($value);
    }

    /* 获取富文本区域 */
    public function getTextAttr($value) {
        return htmlspecialchars_decode($value);
    }
}