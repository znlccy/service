<?php

use think\migration\Migrator;
use think\migration\db\Column;

class EnterTeam extends Migrator
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
        $table = $this->table('tb_enter_team');
        $table->addColumn('company_name', 'string', array('limit' => 50, 'default' => '',  'comment' => '公司名称'))
            ->addColumn('admin_account', 'string', array('limit' => 20,  'comment' => '管理员账户'))
            ->addColumn('business_license', 'string', array('limit' => 30, 'default' => '',  'comment' => '营业执照'))
            ->addColumn('business_license_picture', 'string', array('limit' => 80,  'comment' => '营业执照扫描件'))
            ->addColumn('legal_person', 'string', array('limit' => 20,  'comment' => '法人姓名'))
            ->addColumn('id_card', 'string', array('limit' => 18,  'comment' => '法人身份证'))
            ->addColumn('id_card_picture', 'string', array('limit' => 255, 'default' => '',  'comment' => '身份证正反扫描件'))
            ->addColumn('main_business', 'string', array('limit' => 30,  'comment' => '主营业务'))
            ->addColumn('develop_stage', 'decimal', array('limit' => 30, 'default' => 0,  'comment' => '发展阶段'))
            ->addColumn('description', 'text', array('limit' => 0, 'default' => NULL,  'comment' => '团队介绍'))
            ->addColumn('logo', 'string', array('limit' => 80, 'default' => '',  'comment' => '公司LOGO'))
            ->addTimestamps()
            ->create();
    }
}
