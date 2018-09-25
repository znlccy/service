<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25
 * Time: 15:26
 * Comment: 问题验证器
 */

namespace app\admin\validate;

class Question extends BaseValidate {

    /* 验证规则 */
    protected $rule = [
        'id'            => 'number',
        'content'       => 'max:255',

    ];

    /* 验证消息 */
    protected $field = [

    ];

    /* 验证场景 */
    public function sceneIndex() {

    }

    public function sceneSave() {

    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require|number');
    }

    public function sceneDelete() {
        return $this->only(['id'])
            ->append('id', 'require|number');
    }
}
