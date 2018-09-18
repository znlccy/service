<?php

namespace app\admin\validate;

use think\Validate;

class DepartmentUser extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'user_id' => 'require|number',
        'department_id' => 'require|number',
        'role' => 'require|number'
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'user_id' => '成员id',
        'department_id' => '部门id',
        'role' => '角色'
    ];
}
