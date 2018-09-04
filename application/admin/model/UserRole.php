<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20 0020
 * Time: 下午 6:19
 */

namespace app\admin\model;

class UserRole extends BaseModel {

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_admin_role';

    protected $autoWriteTimestamp = false;
}