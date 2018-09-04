<?php

namespace app\index\validate;

use think\Validate;

class Linkman extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'page_size'     => 'number',
        'jump_page'     => 'number',
        'id'            => 'number',
	    'enter_team_id' => 'require|number',
        'f_linkman' => 'max:30',
        'f_mobile' => 'requireIf:f_remind,2|mobile',
        'f_mobile_code' => 'requireWith:f_mobile',
        'f_email' => 'requireIf:f_remind,1|email',
        'f_remind' => 'requireWith:f_linkman|in:1,2',
        'e_linkman' => 'max:30',
        'e_mobile' => 'requireIf:e_remind,2|mobile',
        'e_mobile_code' => 'requireWith:e_mobile',
        'e_email' => 'requireIf:e_remind,1|email',
        'e_remind' => 'requireWith:e_linkman|in:1,2',
        'a_linkman' => 'max:30',
        'a_mobile' => 'requireIf:a_remind,2|mobile',
        'a_mobile_code' => 'requireWith:a_mobile',
        'a_email' => 'requireIf:a_remind,1|email',
        'a_remind' => 'requireWith:a_linkman|in:1,2',

    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'page_size' => '每页数量',
        'jump_page' => '页码',
        'enter_team_id' => '入驻团队id',
        'f_linkman' => '行政联系人',
        'f_mobile' => '行政电话',
        'f_mobile_code' => '验证码',
        'f_email' => '行政邮箱',
        'f_remind' => '行政接收提醒',
        'e_linkman' => '财务联系人',
        'e_mobile' => '财物电话',
        'e_mobile_code' => '验证码',
        'e_email' => '财务邮箱',
        'e_remind' => '财务接收提醒',
        'a_linkman' => '紧急联系人',
        'a_mobile' => '紧急电话',
        'a_mobile_code' => '验证码',
        'a_email' => '紧急邮箱',
        'a_remind' => '紧急接收提醒',
    ];

    /**
     * 验证场景
     *
     */
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'name'])
            ->remove('name', 'require');
    }

    public function sceneDetail()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function sceneDelete()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }
}
