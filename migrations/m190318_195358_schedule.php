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
                'departure_id'=> $this->integer(11)->notNull(),
                'departure_time'=> $this->datetime()->notNull(),
                'arrival_id'=> $this->integer(11)->notNull(),
                'arrival_time'=> $this->datetime()->notNull(),
                'travel_time'=> $this->integer(11)->notNull(),
                'cost'=> $this->decimal(10, 2)->notNull(),
                'carrier_id'=> $this->integer(11)->notNull(),
                'days'=> $this->text()->notNull(),
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
        $this->dropIndex('carrier_id', '{{%schedule}}');
        $this->dropIndex('departure_id', '{{%schedule}}');
        $this->dropIndex('arrival_id', '{{%schedule}}');
        $this->dropTable('{{%schedule}}');
    }
}
