<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 11:26
 * Comment: 政策验证器
 */
namespace app\admin\validate;

class Policy extends BaseValidate {
    
    /* 验证规则 */
    protected $rule = [
        'id'            => 'number',
        'title'         => 'require|max:255',
        'content'       => 'require|max:300',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'status'         => 'number|in:0,1',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    /* 验证字段 */
    protected $field = [
        'id'            => '政策主键',
        'title'         => '政策标题',
        'content'       => '政策内容',
        'create_start'  => '政策创建起始时间',
        'create_end'    => '政策创建截止时间',
        'update_start'  => '政策更新起始时间',
        'update_end'    => '政策更新截止时间',
        'status'        => '政策状态',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    /* 验证列表场景 */
    public function sceneIndex() {
        return $this->only(['id', 'title', 'content', 'status', 'create_start', 'create_end', 'update_start', 'update_end', 'page_size', 'jump_page'])
            ->remove('publisher','max:255')
            ->remove('id', 'require')
            ->remove('title', 'require')
            ->remove('content', 'require')
            ->remove('status'. 'require');
    }

    /* 验证添加更新场景 */
    public function sceneSave() {
        return $this->only(['id', 'title', 'content', 'status'])
            ->append('title', 'require')
            ->append('content', 'require')
            ->append('status', 'require')
            ->remove('id', 'require');
    }

    /* 验证详情场景 */
    public function sceneDetail() {
        return $this->only(['id'])
            ->append('id', 'require');
    }

    /* 验证删除场景 */
    public function sceneDelete() {
        return $this->only(['id'])
            ->append('id', 'require');
    }

}