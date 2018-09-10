<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 18:21
 * Comment: 供应商控制器
 */

namespace app\admin\validate;

class Facilitator extends BaseValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'title'         => 'max:255',
        'url'           => 'url',
        'profile'       => 'max:255',
        'description'   => 'max:255',
        'price_start'   => 'float',
        'price_end'     => 'float',
        'validate_start'=> 'date',
        'validate_end'  => 'date',
        'status'        => 'number',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'publisher'     => 'max:255',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $field = [
        'id'            => '服务商品主键',
        'title'         => '服务商品标题',
        'url'           => '服务商品链接',
        'profile'       => '服务商品简介',
        'description'   => '服务商品描述',
        'price_start'   => '服务商品价格起始区间',
        'price_end'     => '服务商品价格截止区间',
        'validate_start'=> '服务商品有效起始时间',
        'validate_end'  => '服务商品有效截止时间',
        'status'        => '服务商品状态',
        'create_start'  => '服务商品创建起始时间',
        'create_end'    => '服务商品创建截止时间',
        'update_start'  => '服务商品更新起始时间',
        'update_end'    => '服务商品更新截止时间',
        'publisher'     => '服务商品发布者',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    public function sceneIndex() {
        return $this->only(['id', 'title', 'url', 'profile', 'description', 'price_start', 'price_end', 'validate_start', 'validate_end', 'status', 'create_start', 'create_end', 'update_start', 'update_end','publisher', 'page_size', 'jump_page'])
            ->remove('publisher', 'max:255');
    }

    public function sceneSave() {
        return $this->only(['id', 'title', 'url', 'profile', 'description', 'price', 'validate_time', 'status'])
            ->append('title','require|max:255');
    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneDelete() {
        return $this->only(['id'])
            ->append('id', 'require');
    }

}