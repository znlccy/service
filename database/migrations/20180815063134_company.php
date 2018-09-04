<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Company extends Migrator
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
        $table = $this->table('tb_company',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 50,'comment'=>'公司全称'))
            ->addColumn('profile', 'string',array('limit' => 255,'comment'=>'公司简介'))
            ->addColumn('address', 'string',array('limit' => 100,'comment'=>'公司地址'))
            ->addColumn('phone', 'string',array('limit' => 15,'comment'=>'联系电话'))
            ->addColumn('logo', 'string',array('limit' => 80,'default'=>'','comment'=>'公司LOGO'))
            ->addIndex(array('name'), array('unique' => true))
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('tb_company');
    }
}
