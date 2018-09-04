<?php

namespace app\admin\model;

use think\Model;

class Order extends BaseModel
{
    protected $table = 'tb_order';

    /**
     * @return \think\model\relation\HasOne
     * 关联入驻团队
     */
    public function team()
    {
        return $this->hasOne('EnterTeam', 'id', 'team_id')->field('id,company');
    }

    /**
     * @return \think\model\relation\HasOne
     * 关联发票
     */
    public function invoice()
    {
        return $this->hasOne('Invoice', 'invoice_no', 'invoice_no');
    }

    /**
     * @return \think\model\relation\HasOne
     * 关联合同模板
     */
    public function contactTemplate()
    {
        return $this->hasOne('ContactTemplate', 'template_no', 'contract_template_no');
    }

    /**
     * @return \think\model\relation\HasOne
     * 关联创建人(后台管理员)
     */
    public function operator()
    {
        return $this->hasOne('Admin', 'id', 'operator_id');
    }
}
