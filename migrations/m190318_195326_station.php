<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Station;

class m190318_195326_station extends Migration
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
            Station::TABLE_NAME,
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(255)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable(Station::TABLE_NAME);
    }
}
