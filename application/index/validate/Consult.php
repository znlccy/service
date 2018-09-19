<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 16:35
 * Comment: 咨询验证器
 */

namespace app\index\validate;

class Consult extends BasisValidate {

    /* 验证规则 */
    protected $rule = [
        'id'        => 'number',
        'page_size' => 'number',
        'jump_page' => 'number'
    ];

    /* 验证字段 */
    protected $field = [
        'id'        => '咨询主键',
        'page_size' => '分页大小',
        'jump_page' => '跳转页'
    ];

    /* 验证场景 */
    public function sceneIndex() {
        return $this->only(['page_size','jump_page'])
            ->remove('id', 'require');
    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require|number');
    }
}