<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $departure_id
 * @property string $departure_time
 * @property int $arrival_id
 * @property string $arrival_time
 * @property int $travel_time
 * @property string $cost
 * @property int $carrier_id
 * @property string $days
 *
 * @property Carrier $carrier
 * @property Station $arrival
 * @property Station $departure
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departure_id', 'departure_time', 'arrival_id', 'arrival_time', 'travel_time', 'cost', 'carrier_id', 'days'], 'required'],
            [['departure_id', 'arrival_id', 'travel_time', 'carrier_id'], 'integer'],
            [['departure_time', 'arrival_time'], 'safe'],
            [['cost'], 'number'],
            [['days'], 'string'],
            [['carrier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrier::className(), 'targetAttribute' => ['carrier_id' => 'id']],
            [['arrival_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['arrival_id' => 'id']],
            [['departure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['departure_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departure_id' => 'Departure ID',
            'departure_time' => 'Departure Time',
            'arrival_id' => 'Arrival ID',
            'arrival_time' => 'Arrival Time',
            'travel_time' => 'Travel Time',
            'cost' => 'Cost',
            'carrier_id' => 'Carrier ID',
            'days' => 'Days',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrier()
    {
        return $this->hasOne(Carrier::className(), ['id' => 'carrier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrival()
    {
        return $this->hasOne(Station::className(), ['id' => 'arrival_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeparture()
    {
        return $this->hasOne(Station::className(), ['id' => 'departure_id']);
    }
}
