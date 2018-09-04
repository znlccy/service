<?php

namespace app\admin\validate;

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
        'check_user' => 'number',
        'check_time' => 'date',
        'status' => 'require|number'
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
        'check_user' => '审核人',
        'check_time' => '审核时间',
        'status' => '状态'
    ];

    //验证场景
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

    public function sceneCheck()
    {
        return $this->only(['id', 'status', 'check_user', 'check_time' => 'require|date'])
            ->append('id', 'require')
            ->append('check_user', 'require')
            ->append('check_time', 'require');
    }
}
