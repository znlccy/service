<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10
 * Time: 11:25
 * Comment: 活动报名验证器
 */

namespace app\admin\validate;

class ActivityRegistration extends BaseValidate {

    //验证规则
    protected $rule = [
        'user_id'       => 'number',
        'activity_id'   => 'number',
        'activity_name' => 'max:255',
        'company'       => 'max:255',
        'apply_start'   => 'date',
        'apply_end'     => 'date',
        'mobile'        => 'number|length:1,12',
        'email'         => 'email',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $field = [
        'user_id'       => '用户主键',
        'activity_id'   => '活动主键',
        'activity_name' => '活动名称',
        'company'       => '公司名称',
        'apply_start'   => '申请开始时间',
        'apply_end'     => '申请结束时间',
        'mobile'        => '手机号码',
        'email'         => '电子邮箱',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    public function sceneIndex() {
        return $this->only(['user_id','activity_id','activity_name','company','apply_start','apply_end','mobile','email','page_size','jump_page'])
            ->append('user_id', 'number')
            ->append('activity_id', 'number')
            ->append('activity_name', 'max:255')
            ->append('company', 'max:255')
            ->append('apply_start', 'date')
            ->append('apply_end', 'date')
            ->append('mobile', 'number|length:1,12')
            ->append('email','max:255')
            ->append('page_size', 'number')
            ->append('jump_page', 'number');
    }

    public function sceneAttach() {
        return $this->only(['user_id', 'activity_id'])
            ->append('user_id', 'require|number')
            ->append('activity_id', 'require|number');
    }

    public function sceneDetach() {
        return $this->only(['user_id', 'activity_id'])
            ->append('user_id', 'require|number')
            ->append('activity_id', 'require|number');
    }

    public function sceneDetail() {
        return $this->only(['activity_id'])
            ->append('activity_id', 'require|number');
    }

}