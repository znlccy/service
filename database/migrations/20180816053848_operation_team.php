<?php

use think\migration\Migrator;
use think\migration\db\Column;

class OperationTeam extends Migrator
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
        $table = $this->table('tb_operation_team',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 50,'comment'=>'空间全称'))
            ->addColumn('leader_id', 'integer',array('limit' => 11,'comment'=>'负责人'))
            ->addColumn('description', 'string',array('limit' => 255,'comment'=>'描述'))
            ->addColumn('management_type', 'integer',array('limit' => 2, 'default' => 0, 'comment'=>'管理模式'))
            ->addIndex(array('name'), array('unique' => true))
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('tb_operation_team');
    }
}
