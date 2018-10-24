<?php

namespace app\index\validate;

use think\Validate;

class EnterTeam extends Validate
{
    // 身份证匹配规则
    // protected $regex = ['id_card' => '/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/'];
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'id' => 'number',
        'company' => 'require|max:50',
        'admin_account' => 'require|max:20',
        'business_license' => 'require|max:30',
        'bl_picture' => 'requireCallback:id_null|max:80',
        'legal_person' => 'require|max:20',
        'id_card' => 'require|idCard',
        'id_card_pictures' => 'requireCallback:id_null|max:255',
        'main_business' => 'require|max:30',
        'develop_stage' => 'require|max:30',
        'description' => 'require',
        'logo' => 'requireCallback:id_null|max:80',
        'status' => 'number'
    ];

    /**
     * 定义字段信息
     * 格式：'字段名'	=>	'中文信息'
     *
     * @var array
     */
    protected $field = [
        'page_size'    => '每页数量',
        'jump_page'    => '页码',
        'company' => '公司名称',
        'main_business' => '主营业务',
        'develop_stage' => '发展阶段',
        'description' => '团队介绍',
        'logo' => '公司LOGO',
        'status' => '状态'
    ];
    //验证场景
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'company'])
            ->remove('company', 'require');
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

    public function sceneIntroduce()
    {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    public function id_null($value, $data) {
        if (empty($data['id'])) {
            return true;
        }
    }
}
