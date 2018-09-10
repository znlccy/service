<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 18:21
 * Comment: 活动模型
 */

namespace app\admin\model;

class Activity extends BaseModel {

    /* 自动读取写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 关联的数据表 */
    protected $table = 'tb_activity';

    /* 设置富文本属性 */
    public function setRichTextAttr($value) {
        return htmlspecialchars($value);
    }

    /* 获取富文本属性 */
    public function getRichTextAttr($value) {
        return htmlspecialchars_decode($value);
    }

    /* 关联的数据表 */
    public function user() {
        return $this->belongsToMany('User', 'tb_user_activity','user_id','activity_id');
    }

}