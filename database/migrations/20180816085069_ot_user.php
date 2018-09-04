<?php

use think\migration\Migrator;
use think\migration\db\Column;

class OtUser extends Migrator
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
        $table = $this->table('tb_ot_user',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 50,'comment'=>'名称'))
            ->addColumn('mobile', 'string',array('limit' => 13,'comment'=>'手机号'))
            ->addColumn('email', 'string',array('limit' => 30,'comment'=>'邮箱'))
            ->addColumn('role_id', 'integer',array('limit' => 11, 'default' => 0,'comment'=>'角色id'))
            ->addIndex(array('name'), array('unique' => true))
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('tb_ot_user');
    }
}
