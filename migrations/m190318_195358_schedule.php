<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_195358_schedule extends Migration
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
            '{{%schedule}}',
            [
                'id'=> $this->primaryKey(11),
                'departure_id'=> $this->integer(11),
                'departure_time'=> $this->string(255),
                'arrival_id'=> $this->integer(11),
                'arrival_time'=> $this->string(255),
                'travel_time'=> $this->integer(11),
                'cost'=> $this->decimal(10, 2),
                'carrier_id'=> $this->integer(11),
                'days'=> $this->text(),
            ],$tableOptions
        );
        $this->createIndex('carrier_id','{{%schedule}}',['carrier_id'],false);
        
        $this->addForeignKey(
            'fk-carrier-carrier_id',
            'schedule',
            'carrier_id',
            'carrier',
            'id',
            'CASCADE'
        );
        
        $this->createIndex('departure_id','{{%schedule}}',['departure_id'],false);
        
        $this->addForeignKey(
            'fk-station-departure_id',
            'schedule',
            'departure_id',
            'station',
            'id',
            'CASCADE'
        );
        
        $this->createIndex('arrival_id','{{%schedule}}',['arrival_id'],false);
        
        $this->addForeignKey(
            'fk-station-arrival_id',
            'schedule',
            'arrival_id',
            'station',
            'id',
            'CASCADE'
        );

    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-carrier-carrier_id',
            'schedule'
        );
        
        $this->dropForeignKey(
            'fk-station-departure_id',
            'schedule'
        );
        
        $this->dropForeignKey(
            'fk-station-arrival_id',
            'schedule'
        );
        
        $this->dropIndex('carrier_id', '{{%schedule}}');
        $this->dropIndex('departure_id', '{{%schedule}}');
        $this->dropIndex('arrival_id', '{{%schedule}}');
        $this->dropTable('{{%schedule}}');
    }
}
