<?php

namespace app\index\model;

class Activity extends BasisModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 对应的数据表 */
    protected $table = 'tb_activity';

    /* 设置富文本区域 */
    public function setRichTextAttr($value) {
        return htmlspecialchars($value);
    }

    /* 回去富文本区域 */
    public function getRichTextAttr($value) {
        return htmlspecialchars_decode($value);
    }
}
