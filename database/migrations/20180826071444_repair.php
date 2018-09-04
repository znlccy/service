<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Repair extends Migrator
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
        $table = $this->table('tb_repair',array('engine'=>'InnoDB'));
        $table->addColumn('description', 'string',array('limit' => 255,'comment'=>'报修描述'))
            ->addColumn('equipment_no', 'string',array('limit' => 20, 'comment'=>'设备编号'))
            ->addColumn('repair_man', 'string',array('limit' => 255, 'comment'=>'报修人'))
            ->addColumn('mobile', 'string',array('limit' => 13, 'comment'=>'报修人电话'))
            ->addColumn('status', 'integer',array('limit' => 2, 'default' => 0, 'comment'=>'状态'))
            ->addTimestamps()
            ->create();
    }
}
