<?php

use think\migration\Migrator;
use think\migration\db\Column;

class News extends Migrator
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
        //获取数据表对象
        $table=$this->table('news');
        //
        $table->addColumn('name','string',[
            'limit'=>100,
            'comment'=>'新闻标题'
        ]);
        $table->addColumn('desc','string',[
            'limit'=>255
        ]);
        $table->addColumn('content','text');
        //执行操作
        $table->create();
    }
}
