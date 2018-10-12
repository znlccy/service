<?php

namespace app\admin\validate;

use think\Validate;

class Repair extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'description' => 'require',
        'equipment_no' => 'require|max:20',
        'repair_man' => 'require',
        'mobile' => 'require|mobile',
        'status' => 'require|number',
        'remark' => 'requireIf:status,2',
        'check_user' => 'number',
        'check_time' => 'date',
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
        'id' => '主键id',
        'description' => '报修描述',
        'equipment_no' => '设备编号',
        'repair_man' => '报修人',
        'mobile' => '联系电话',
        'status' => '状态',
        'remark' => '拒绝理由',
        'check_user' => '审核人',
        'check_time' => '审核时间'
    ];

    //验证场景
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

    public function sceneCheck()
    {
        return $this->only(['id', 'status', 'check_user', 'check_time', 'remark'])
            ->append('id', 'require')
            ->append('check_user', 'require')
            ->append('check_time', 'require');
    }

}
