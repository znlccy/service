<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Contract extends Migrator
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
        $table = $this->table('tb_contract',array('engine'=>'InnoDB'));
        $table->addColumn('contract_no', 'string',array('limit' => 20,'comment'=>'合同编号'))
            ->addColumn('order_id', 'integer',array('limit' => 11,'comment'=>'关联订单'))
            ->addColumn('template_id', 'integer',array('limit' => 11,'comment'=>'合同模板'))
            ->addColumn('creator', 'integer',array('limit' => 11, 'comment'=>'创建者'))
            ->addColumn('effective_time', 'timestamp',array('limit' => 0,'comment'=>'生效时间'))
            ->addColumn('failure_time', 'timestamp',array('limit' => 0,'comment'=>'失效时间'))
            ->addColumn('status', 'integer',array('limit' => 2,'comment'=>'状态'))
            ->addTimestamps()
            ->create();
    }
}
