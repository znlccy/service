<?php

use think\migration\Migrator;
use think\migration\db\Column;

class EnterTeamMember extends Migrator
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
        $table = $this->table('tb_enter_team_member');
        $table->addColumn('name', 'string', array('limit' => 30, 'default' => '',  'comment' => '姓名'))
            ->addColumn('position', 'string', array('limit' => 20,  'comment' => '职务'))
            ->addColumn('signature', 'string', array('limit' => 100, 'default' => '',  'comment' => '签名'))
            ->addColumn('achievement', 'text', array('limit' => 0,  'comment' => '主要成就'))
            ->addColumn('resume', 'text', array('limit' => 0,  'comment' => '个人履历'))
            ->addColumn('picture', 'string', array('limit' => 80, 'default' => '',  'comment' => '形象图'))
            ->addColumn('enter_team_id', 'integer', array('limit' => 11,  'comment' => '入驻团队id'))
            ->addTimestamps()
            ->create();
    }
}
