<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_195149_carrier extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%carrier}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(255)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%carrier}}');
    }
}
