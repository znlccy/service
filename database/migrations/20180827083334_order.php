<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Order extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('tb_order',array('engine'=>'InnoDB'));
        $table->addColumn('order_no', 'string',array('limit' => 20,'comment'=>'订单编号'))
            ->addColumn('team_id', 'integer',array('limit' => 20, 'comment'=>'团队id'))
            ->addColumn('contract_template_no', 'string',array('limit' => 20, 'comment'=>'合同模板编号'))
            ->addColumn('contract_years', 'integer',array('limit' => 4, 'default' => 1, 'comment'=>'合同年限'))
            ->addColumn('pay_type', 'integer',array('limit' => 2, 'default' => 1,'comment'=>'付款方式'))
            ->addColumn('deposit', 'decimal',array('limit' => 10,'comment'=>'定金'))
            ->addColumn('rich_text', 'text',array('limit' => 0,'comment'=>'富文本'))
            ->addColumn('total_price', 'decimal',array('limit' => 10,'comment'=>'订单总价'))
            ->addColumn('invoice_no', 'string',array('limit' => 20,'comment'=>'发票编号'))
            ->addColumn('discount', 'decimal',array('limit' => 10,'comment'=>'折扣'))
            ->addColumn('remark', 'string',array('limit' => 255,'comment'=>'备注'))
            ->addColumn('status', 'integer',array('limit' => 2,'comment'=>'状态'))
            ->addTimestamps()
            ->create();
    }
}
