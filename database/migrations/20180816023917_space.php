<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Space extends Migrator
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
        $table = $this->table('tb_space',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 50,'comment'=>'空间全称'))
            ->addColumn('operation_team_id', 'integer',array('limit' => 11,'comment'=>'运营团队'))
            ->addColumn('province_id', 'integer',array('limit' => 11,'comment'=>'省份'))
            ->addColumn('city_id', 'string',array('limit' => 11,'comment'=>'市'))
            ->addColumn('district_id', 'string',array('limit' => 11,'default'=>'','comment'=>'区县'))
            ->addColumn('short_name', 'string',array('limit' => 10,'comment'=>'空间简称'))
            ->addColumn('address', 'string',array('limit' => 100,'comment'=>'空间地址'))
            ->addColumn('short_description', 'string',array('limit' => 100,'comment'=>'空间简介'))
            ->addColumn('description', 'text',array('limit' => '','comment'=>'空间介绍'))
            ->addColumn('position_picture', 'string',array('limit' => 100,'comment'=>'地理位置截图'))
            ->addColumn('space_picture', 'string',array('limit' => 255,'comment'=>'地理位置截图'))
            ->addIndex(array('name'), array('unique' => true))
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('tb_space');
    }
}
