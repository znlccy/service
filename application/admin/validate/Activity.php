<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 18:21
 * Comment: 活动验证器
 */

namespace app\admin\validate;

class Activity extends BaseValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'title'         => 'max:255',
        'content'       => 'max:255',
        'status'        => 'number|in:0,1',
        'recommend'     => 'number|in:0,1',
        'publisher'     => 'max:255',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $field = [
        'id'            => '活动主键',
        'title'         => '活动标题',
        'content'       => '活动内容',
        'status'        => '活动状态',
        'recommend'     => '活动推荐',
        'picture'       => '活动图片',
        'publisher'     => '活动发布者',
        'create_start'  => '活动创建起始时间',
        'create_end'    => '活动创建截止时间',
        'update_start'  => '活动更新起始时间',
        'update_end'    => '活动更新截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    public function sceneIndex() {
        return $this->only(['id', 'title', 'content', 'status', 'recommend', 'publisher', 'create_start', 'create_end', 'update_start', 'update_end', 'page_size', 'jump_page'])
            ->remove('id', 'require');
    }

    public function sceneSave() {
        return $this->only(['id', 'title', 'content', 'status', 'recommend', 'publisher', 'picture'])
            ->append('title', 'require|max:255')
            ->append('content', 'require|max:255')
            ->append('status', 'require|number|in:0,1')
            ->append('recommend', 'require|number|in:0,1');
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
