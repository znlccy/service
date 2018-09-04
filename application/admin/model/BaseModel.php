<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16 0016
 * Time: 下午 5:36
 */

namespace app\admin\model;

use think\Model;


class BaseModel extends Model
{
    protected $autoWriteTimestamp = 'timestamp';

    /**
     * 富文本标签转义
     */
    public function setRichTextAttr($value)
    {
        return htmlspecialchars($value);
    }

    public function getRichTextAttr($value)
    {
        return htmlspecialchars_decode($value);
    }
}