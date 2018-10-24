<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/4
 * Time: 18:48
 * Comment: 咨询政策模型
 */

namespace app\admin\model;

class ConsultPolicy extends BaseModel {

    /**
     * 自动写入读取时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_consult_policy';

    /**
     * 一对一关联
     * @return \think\model\relation\HasOne
     */
    /*protected function type() {
        return $this->hasOne('Type', 'type_id', 'id');
    }*/

    public function setRichTextAttr($value){
        return htmlspecialchars($value);
    }

    public function getRichTextAttr($value) {
        return htmlspecialchars_decode($value);
    }
}