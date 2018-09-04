<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Workplace extends Migrator
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
        $table = $this->table('tb_workplace');
        $table->addColumn('workplace_no', 'string', array('limit' => 10, 'default' => 0,  'comment' => '工位ID'))
            ->addColumn('space_id', 'integer', array('limit' => 11,  'comment' => '所属空间'))
            ->addColumn('type', 'integer', array('limit' => 2, 'default' => 0,  'comment' => '工位类型(0=>按个租赁，1=>按面积租赁)'))
            ->addColumn('group_id', 'integer', array('limit' => 11,  'comment' => '分组'))
            ->addColumn('enter_team_id', 'integer', array('limit' => 11, 'default' => NULL,  'comment' => '租赁团队'))
            ->addColumn('price', 'decimal', array('limit' => [10,2], 'default' => 0.00,  'comment' => '租赁单价'))
            ->addColumn('status', 'integer', array('limit' => 2, 'default' => 0,  'comment' => '状态'))
            ->addColumn('deadline', 'timestamp', array('limit' => 0, 'default' => NULL,  'comment' => '到期时间'))
            ->addColumn('total_area', 'decimal', array('limit' => [10,2], 'default' => 0,  'comment' => '总面积'))
            ->addColumn('residual_area', 'decimal', array('limit' => [10,2], 'default' => 0,  'comment' => '剩余面积'))
            ->addTimestamps()
            ->create();
    }
}
