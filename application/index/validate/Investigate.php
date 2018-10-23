<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18
 * Time: 16:16
 * Comment: 调查验证器
 */

namespace app\index\validate;

class Investigate extends BasisValidate {

    /* 验证规则 */
    protected $rule = [
        'id'            => 'number',
        'investigate_id'=> 'number',
        'option_id'     => 'array',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    /* 验证消息 */
    protected $field = [
        'id'            => '调查主键',
        'investigate_id'=> '调查主键',
        'option_id'     => '选项数组主键',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
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

    public function sceneSubmit() {
        return $this->only(['investigate_id', 'answer'])
            ->append('id', 'require|number')
            ->append('answer', 'max:800');
    }
}