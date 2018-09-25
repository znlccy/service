<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10
 * Time: 17:01
 * Comment: 问卷调查验证器
 */

namespace app\admin\validate;

class Investigate extends  BaseValidate {

    /* 验证规则 */
    protected $rule = [
        'id'            => 'number',
        'title'         => 'max:255',
        'publisher'     => 'max:255',
        'type'          => 'number|in:0,1',
        'status'        => 'number|in:0,1',
        'publish_start' => 'date',
        'publish_end'   => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $field = [
        'id'            => '调查主键',
        'title'         => '调查主键',
        'publisher'     => '发布人',
        'type'          => '调查类型',
        'status'        => '调查状态',
        'publish_start' => '发布开始时间',
        'publish_end'   => '发布截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    protected function sceneIndex() {
        return $this->only(['id','title','publisher','type','status','publish_start','publish_end','page_size','jump_page'])
            ->append('id','number')
            ->append('title','max:255')
            ->append('publisher','max:255')
            ->append('type','number')
            ->append('status','number')
            ->append('publish_start','date')
            ->append('publish_end','date')
            ->append('page_size','number')
            ->append('jump_page','number')
            ->remove('id','require');
    }

    public function sceneSave() {
        return $this->only(['id','title','status'])
            ->append('title','require|max:255');
    }

    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id','require|number');
    }

    public function sceneDelete() {
        return $this->only(['id'])
            ->append('id','require|number');
    }
}