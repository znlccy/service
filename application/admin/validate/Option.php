<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25
 * Time: 11:13
 * Comment: 选项验证器
 */

namespace app\admin\validate;

class Option extends BaseValidate {

    /* 验证规则 */
    protected $rule = [
        'id'            => 'number',
        'content'       => 'max:255',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    /* 验证字段 */
    protected $message = [
        'id'            => '选项主键',
        'content'       => '选项内容',
        'create_start'  => '选项创建起始时间',
        'create_end'    => '选项创建截止时间',
        'update_start'  => '选项更新起始时间',
        'update_end'    => '选项更新截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    /* 验证场景 */
    public function sceneIndex() {
        return $this->only(['id', 'content', 'create_start', 'create_end', 'update_start', 'update_end','page_size', 'jump_page'])
            ->append('id', 'number')
            ->append('content', 'max:255')
            ->append('create_start', 'date')
            ->append('create_end', 'date')
            ->append('update_start','date')
            ->append('update_end', 'date')
            ->append('page_size','number')
            ->append('jump_page', 'number')
            ->remove('id', 'require');
    }

    public function sceneSave() {
        return $this->only(['id','content'])
            ->append('id', 'number')
            ->append('content', 'require|max:255');
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