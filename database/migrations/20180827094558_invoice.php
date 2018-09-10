<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Invoice extends Migrator
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
        $table = $this->table('tb_invoice',array('engine'=>'InnoDB'));
        $table->addColumn('order_no', 'string',array('limit' => 20,'comment'=>'订单号'))
            ->addColumn('opener_type', 'integer',array('limit' => 2,'comment'=>'开具类型'))
            ->addColumn('invoice_title', 'string',array('limit' => 50,'comment'=>'发票抬头'))
            ->addColumn('type', 'integer',array('limit' => 2,'comment'=>'发票类型'))
            ->addColumn('tax', 'string',array('limit' => 25,'comment'=>'税务登记证号'))
            ->addColumn('bank', 'string',array('limit' => 50,'comment'=>'开户银行'))
            ->addColumn('account', 'string',array('limit' => 30, 'comment'=>'开户账号'))
            ->addColumn('address', 'string',array('limit' => 255,'comment'=>'注册场所地址'))
            ->addColumn('phone', 'string',array('limit' => 13,'comment'=>'注册电话'))
            ->addColumn('status', 'integer',array('limit' => 2,'comment'=>'状态'))
            ->addTimestamps()
            ->create();
    }
}
