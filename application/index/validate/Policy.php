<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 16:35
 * Comment: 政策验证器
 */

namespace app\index\validate;

class Policy extends BasisValidate {

    /* 验证规则 */
    protected $rule = [
        'id'        => 'number',
        'page_size' => 'number',
        'jump_page' => 'number'
    ];

    /* 验证消息 */
    protected $field = [
        'id'        => '政策主键',
        'page_size' => '分页大小',
        'jump_page' => '跳转页'
    ];

    /* 验证场景 */
    public function sceneIndex() {
        return $this->only(['page_size', 'jump_page'])
            ->remove('id', 'require');
    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require|number');
    }

}