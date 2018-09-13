<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 13:34
 * Comment: 分组验证器
 */

namespace app\admin\validate;

class Group extends BaseValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'name'          => 'max:255',
        'sort'          => 'number|min:1',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $field = [
        'id'            => '分组主键',
        'name'          => '分组名称',
        'sort'          => '分组排序',
        'create_start'  => '分组创建起始时间',
        'create_end'    => '分组创建截止时间',
        'update_start'  => '分组更新起始时间',
        'update_end'    => '分组更新截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    public function sceneIndex() {
        return $this->only(['id', 'name', 'sort', 'create_start', 'create_end', 'update_start', 'update_end', 'page_size', 'jump_page'])
            ->remove('id', 'require');
    }

    public function sceneSave() {
        return $this->only(['id', 'name', 'sort'])
            ->append('id', 'number')
            ->append('name', 'require|max:255')
            ->append('sort', 'require|number|min:1');
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
