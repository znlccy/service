<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Development extends Migrator
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
        $table = $this->table('tb_development',array('engine'=>'InnoDB'));
        $table->addColumn('enter_team_id', 'integer',array('limit' => 11,'comment'=>'入驻团队'))
            ->addColumn('date_time', 'timestamp',array('limit' => 0,'comment'=>'日期'))
            ->addColumn('description', 'string',array('limit' => 255,'comment'=>'描述'))
            ->addTimestamps()
            ->create();
    }
}
