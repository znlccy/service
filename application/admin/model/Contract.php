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
        return $this->hasOne('ContractTemplate', 'template_no', 'contract_template_no');
    }

    public function getContractTemplateNoAttr($value)
    {
        $template = ContractTemplate::where('template_no', $value)->field('id,name,template_no')->find();
        if ($template) {
            return $template;
        } else {
            $template = HistoryTemplate::where('template_no', $value)->field('id,name,template_no')->find();
            return $template;
        }
    }

    /**
     * @return BaseModel|\think\model\relation\HasOne
     * 关联订单
     */
    public function order()
    {
        return $this->hasOne('Order', 'id', 'order_id')->field('id,order_no');
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
