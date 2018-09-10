<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Linkman extends Migrator
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
        $table = $this->table('tb_linkman');
        $table->addColumn('a_linkman', 'string', array('limit' => 30, 'default' => '',  'comment' => '行政联系人'))
            ->addColumn('f_linkman', 'string', array('limit' => 30, 'default' => '',  'comment' => '财务联系人'))
            ->addColumn('e_linkman', 'string', array('limit' => 30, 'default' => '',  'comment' => '紧急联系人'))
            ->addColumn('a_mobile', 'string', array('limit' => 11,  'comment' => '行政联系人电话'))
            ->addColumn('f_mobile', 'string', array('limit' => 11,  'comment' => '财务联系人电话'))
            ->addColumn('e_mobile', 'string', array('limit' => 11,  'comment' => '紧急联系人电话'))
            ->addColumn('a_email', 'string', array('limit' => 30,  'comment' => '行政邮箱'))
            ->addColumn('f_email', 'string', array('limit' => 30,  'comment' => '财务邮箱'))
            ->addColumn('e_email', 'string', array('limit' => 30,  'comment' => '紧急邮箱'))
            ->addColumn('a_remind', 'integer', array('limit' => 2, 'default' => 0, 'comment' => '行政联系人接收提醒方式(0=>短信,1=>邮箱)'))
            ->addColumn('f_remind', 'integer', array('limit' => 2, 'default' => 0, 'comment' => '财务联系人接收提醒方式(0=>短信,1=>邮箱)'))
            ->addColumn('e_remind', 'integer', array('limit' => 2, 'default' => 0, 'comment' => '紧急联系人接收提醒方式(0=>短信,1=>邮箱)'))
            ->addColumn('enter_team_id', 'integer', array('limit' => 11,  'comment' => '入驻团队id'))
            ->addTimestamps()
            ->create();
    }
}
