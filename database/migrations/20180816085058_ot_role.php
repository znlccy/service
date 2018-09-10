<?php

use think\migration\Migrator;
use think\migration\db\Column;

class OtRole extends Migrator
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
        $table = $this->table('tb_ot_role',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 50,'comment'=>'名称'))
            ->addColumn('description', 'string',array('limit' => 255,'comment'=>'描述'))
            ->addColumn('type', 'integer',array('limit' => 2,'comment'=>'角色类型'))
            ->addIndex(array('name'), array('unique' => true))
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('tb_ot_role');
    }
}
