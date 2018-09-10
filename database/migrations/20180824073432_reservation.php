<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Reservation extends Migrator
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
        $table = $this->table('tb_reservation',array('engine'=>'InnoDB'));
        $table->addColumn('venue_id', 'integer',array('limit' => 11,'comment'=>'场馆'))
            ->addColumn('enter_team_id', 'string',array('limit' => 30,'comment'=>'团队'))
            ->addColumn('date', 'date',array('limit' => 0,'comment'=>'日期'))
            ->addColumn('reservation_time', 'string', array('limit' => 100,'comment'=>'预约时间'))
            ->addTimestamps()
            ->create();
    }
}
