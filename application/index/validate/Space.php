<?php

namespace app\index\validate;

use think\Validate;

class Space extends Validate
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
        'name' => 'require|max:50',
        'operation_team_id' => 'require|number',
        'province_id' => 'require|number',
        'city_id' => 'require|number',
        'district_id' => 'require|number',
        'short_name' => 'require|max:20',
        'address' => 'require|max:100',
        'short_description' => 'require|max:100',
        'position_picture' => 'max:100',
        'space_picture' => 'max:255',
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
        'id' => '空间id',
        'name' => '空间全称',
        'operation_team_id' => '运营团队id',
        'province_id' => '省份',
        'city_id' => '市',
        'district_id' => '区县',
        'short_name' => '空间简称',
        'address' => '空间地址',
        'short_description' => '空间简述',
        'position_picture' => '空间位置图片',
        'space_pictures' => '空间图片',
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
