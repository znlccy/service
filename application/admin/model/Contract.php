<?php

namespace app\admin\model;

use think\Model;

class Contract extends BaseModel
{
    protected $table = 'tb_contract';

    /**
     * @return \think\model\relation\HasOne
     * 关联合同模板
     */
    public function template()
    {
        return $this->hasOne('ContactTemplate', 'template_no', 'contact_template_no');
    }

    /**
     * @return BaseModel|\think\model\relation\HasOne
     * 关联订单
     */
    public function order()
    {
        return $this->hasOne('Order', 'order_no', 'order_no');
    }

    /**
     * @return \think\model\relation\HasOne
     * 关联管理员
     */
    public function operator()
    {
        return $this->hasOne('Admin', 'id', 'operator_id')->field('id,nickname');
    }
}
