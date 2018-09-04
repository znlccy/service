<?php

namespace app\admin\validate;

use think\Validate;

class Equipment extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'equipment_no' => 'require|max:20',
        'name' => 'require|max:30',
        'type_id' => 'require|number',
        'space_id' => 'require|number',
        'status' => 'require|number'
    ];

    /**
     * 定义字段中文名
     * 格式：'字段名'	=>	'中文名'
     *
     * @var array
     */
    protected $field = [
        'equipment_no' => '设备编号',
        'name' => '名称',
        'type_id' => '设备类型',
        'space_id' => '所属空间',
        'status' => '状态',
    ];

    //验证场景
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'name' ,'type_id', 'space_id', 'status'])
            ->remove('name', 'require')
            ->remove('type_id', 'require')
            ->remove('space_id', 'require')
            ->remove('status', 'require');
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
