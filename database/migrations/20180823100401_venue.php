<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Venue extends Migrator
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
        $table = $this->table('tb_venue',array('engine'=>'InnoDB'));
        $table->addColumn('venue_no', 'integer',array('limit' => 10,'comment'=>'场馆编号'))
            ->addColumn('name', 'string',array('limit' => 30,'comment'=>'场馆名称'))
            ->addColumn('space_id', 'string',array('limit' => 30,'comment'=>'所属空间'))
            ->addColumn('accommodate_num', 'integer',array('limit' => 11,'comment'=>'容纳人数'))
            ->addColumn('remark', 'string',array('limit' => 255,'comment'=>'备注'))
            ->addColumn('disable_time', 'string',array('limit' => 50,'comment'=>'禁用时间范围'))
            ->addColumn('status', 'integer',array('limit' => 2,'comment'=>'状态'))
            ->addTimestamps()
            ->create();
    }
}
