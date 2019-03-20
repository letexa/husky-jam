<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Carrier;

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
            Carrier::TABLE_NAME,
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(255)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable(Carrier::TABLE_NAME);
    }
}
