<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Equipment extends Migrator
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
        $table = $this->table('tb_equipment',array('engine'=>'InnoDB'));
        $table->addColumn('equipment_no', 'string',array('limit' => 10,'comment'=>'设备编号'))
            ->addColumn('name', 'string',array('limit' => 20,'comment'=>'设备名称'))
            ->addColumn('type_id', 'integer',array('limit' => 4,'comment'=>'设备类型'))
            ->addColumn('space_id', 'integer',array('limit' => 11,'comment'=>'所属空间'))
            ->addColumn('status', 'integer', array('limit' => 2, 'default'=>1, 'comment'=>'设备状态'))
            ->addTimestamps()
            ->create();
    }
}
