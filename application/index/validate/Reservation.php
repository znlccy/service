<?php

namespace app\index\validate;

use think\Validate;

class Reservation extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'id' => 'number',
        'venue_id' => 'require|number',
        'enter_team_id' => 'require|number',
        'date' => 'require|date',
        'reservation_time' => 'require',
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
        'venue_id' => '场馆id',
        'enter_team_id' => '团队id',
        'date' => '日期',
        'reservation_time' => '预约时间段',
    ];

    //验证场景
    protected $scene = [
        'index'  => ['page_size' => 'number', 'jump_page' => 'number', 'venue_id|number', 'date|date'],
        'detail' => ['id' => 'require|number'],
        'delete' => ['id' => 'require|number'],
    ];

    public function sceneIndex()
    {
        return $this->only(['page_size', 'jump_page', 'venue_id', 'date'])
            ->remove('venue_id', 'require')
            ->remove('date', 'require');
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
