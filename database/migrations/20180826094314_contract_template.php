<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ContractTemplate extends Migrator
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
        $table = $this->table('tb_contract_template',array('engine'=>'InnoDB'));
        $table->addColumn('title', 'string',array('limit' => 30,'comment'=>'模板标题'))
            ->addColumn('template_no', 'string',array('limit' => 20, 'comment'=>'模板编号'))
            ->addColumn('remark', 'string',array('limit' => 255, 'default'=>0, 'comment'=>'备注'))
            ->addColumn('rich_text', 'text',array('limit' => 0, 'comment'=>'富文本内容'))
            ->addColumn('creator', 'integer',array('limit' => 11,'comment'=>'创建人'))
            ->addColumn('status', 'integer',array('limit' => 2,'comment'=>'状态'))
            ->addTimestamps()
            ->create();
    }
}
