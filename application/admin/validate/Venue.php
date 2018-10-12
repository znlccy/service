<?php

namespace app\admin\validate;

use think\Validate;

class Venue extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'id' => 'number',
        'venue_no' => 'require|max:10',
        'name' => 'require|max:30',
        'space_id' => 'require|number',
        'accommodate_num' => 'require|number',
        'remark' => 'require',
        'disable_time' => 'array',
        'status' => 'require|number',
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
        'id' => '场馆id',
        'venue_no' => '场馆编号',
        'name' => '场馆名称',
        'disable_time' => '禁用时间段',
        'space_id' => '所属空间',
        'accommodate_num' => '容纳人数',
        'remark' => '备注',
        'status' => '状态',
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
}
