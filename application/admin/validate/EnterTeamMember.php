<?php

namespace app\admin\validate;

use think\Validate;

class EnterTeamMember extends Validate
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
        'id' => 'number',
        'name' => 'require|max:30',
        'position' => 'require|max:20',
        'signature' => 'require|max:100',
        'achievement' => 'require',
        'resume' => 'require',
        'picture' => 'requireCallback:id_null|max:80',
        'enter_team_id' => 'require|number',
        'status' => 'number',
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
        'id' => '成员id',
        'name' => '姓名',
        'position' => '职务',
        'signature' => '签名',
        'achievement' => '主要成就',
        'resume' => '个人履历',
        'picture' => '形象图片',
        'enter_team_id' => '入驻团队id',
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

    public function id_null($value, $data) {
        if (empty($data['id'])) {
            return true;
        }
    }
}
