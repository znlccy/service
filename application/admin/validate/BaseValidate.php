<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 19:34
 * Comment: 基础验证器
 */

namespace app\admin\validate;

use think\Validate;

class BaseValidate extends Validate {
    // 正则验证联系电话
    protected $regex = [ 'phone' => '/^(0?1[34578]\d{9})$|^0\d{2,3}-?\d{7,8}$/'];
}