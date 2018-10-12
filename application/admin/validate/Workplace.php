<?php

namespace app\admin\validate;

use think\Validate;

class Workplace extends Validate
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
        'workplace_no' => 'require|max:10',
        'space_id' => 'require|number',
        'type' => 'require|number',
        'group_id' => 'require|number',
//        'enter_team_id' => 'require|number',
        'price' => 'require|float',
        'status' => 'require|number',
        'deadline' => 'require|date',
        'total_area' => 'requireIf:type,1|float',
//        'residual_area' => 'requireIf:type,1|float'
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
        'id' => '工位id',
        'workplace_no' => '工位编号',
        'space_id' => '所属空间id',
        'type' => '工位类型',
        'group_id' => '分组id',
//        'enter_team_id' => '租赁团队',
        'price' => '租赁价格',
        'status' => '状态',
        'deadline' => '到期时间',
        'total_area' => '工位面积',
//        'residual_area' => '剩余面积'
    ];

    /**
     * 验证场景
     *
     */
    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'id', 'workplace_no', 'type'])
            ->remove('workplace_no', 'require')
            ->remove('name', 'require');
    }

    public function sceneOneSave()
    {
        return $this->only(['id', 'workplace_no',  'type', 'space_id', 'group_id', 'deadline', 'price', 'status', 'enter_team_id'])
            ->remove('id', 'require');
    }

    public function sceneAreaSave()
    {
        return $this->only(['id', 'workplace_no', 'type', 'space_id', 'group_id', 'deadline', 'price', 'status', 'total_area', 'residual_area'])
            ->remove('id', 'require');
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
