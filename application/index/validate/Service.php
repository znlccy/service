<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14
 * Time: 16:35
 * Comment: 服务验证
 */

namespace app\index\validate;



class Service extends BasisValidate {

    /* 验证规则 */
    protected $rule = [
        'id'        => 'number',
        'group_id'  => 'number',
        'page_size' => 'number',
        'jump_page' => 'number'
    ];

    /* 验证消息 */
    protected $field = [
        'id'        => '服务主键',
        'group_id'  => '分组主键',
        'page_size' => '分页大小',
        'jump_page' => '跳转页'
    ];

    /* 验证场景 */
    public function sceneIndex() {
        return $this->only(['page_size', 'jump_page', 'group_id'])
            ->remove('id', 'require');
    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require|number');
    }

}