<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/7
 * Time: 18:11
 * Comment: 用户和活动之间的关联
 */

namespace app\admin\model;

class UserActivity extends BaseModel {

    /* 自动读取和写入时间 */
    protected $autoWriteTimestamp = 'datetime';

    /* 关联的表 */
    protected $table = 'tb_user_activity';

}