<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 13:41
 * Comment: 服务商验证器
 */

namespace app\admin\validate;

class Service extends BaseValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'name'          => 'max:255',
        'profile'       => 'max:255',
        'description'   => 'max:255',
        'price_start'   => 'float',
        'price_end'     => 'float',
        'recommend'     => 'number|in:0,1',
        'status'        => 'number|in:0,1',
        'address'       => 'max:500',
        'url'           => 'url',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'validate_start'=> 'date',
        'validate_end'  => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $field = [
        'id'            => '服务主键',
        'name'          => '服务名称',
        'profile'       => '服务简介',
        'description'   => '服务描述',
        'price_start'   => '服务价格起始区间',
        'price_end'     => '服务价格截止区间',
        'recommend'     => '服务推荐',
        'status'        => '服务状态',
        'address'       => '服务地址',
        'url'           => '服务连接地址',
        'create_start'  => '服务创建起始时间',
        'create_end'    => '服务创建截止时间',
        'update_start'  => '服务更新起始时间',
        'update_end'    => '服务更新截止时间',
        'validate_start'=> '服务有效起始时间',
        'validate_end'  => '服务有效截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    public function sceneIndex() {

        return $this->only(['id', 'name', 'profile', 'description', 'price_start', 'price_end', 'recommend', 'status', 'address', 'create_start', 'create_end', 'update_start', 'update_end', 'validate_start','validate_end', 'page_size', 'jump_page'])
            ->remove('id', 'require');
    }

    public function sceneSave() {
        return $this->only(['id', 'name', 'group_id', 'profile', 'description', 'price', 'recommend', 'status', 'address', 'url'])
            ->remove('id', 'require');

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