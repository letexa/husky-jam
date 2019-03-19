<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

class Schedule extends \yii\base\Model {
    
    public $id;
    public $departure_id;
    public $departure_time;
    public $arrival_id;
    public $arrival_time;
    public $travel_time;
    public $cost;
    public $carrier_id;
    public $days;
    public $departure;
    public $arrival;
    public $carrier;
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'departure' => 'Станция отправления',
            'departure_time' => 'Время отправления',
            'arrival' => 'Станция прибытия',
            'arrival_time' => 'Время прибытия',
            'travel_time' => 'Время в пути',
            'cost' => 'Цена билета',
            'days' => 'График движения',
            'carrier' => 'Перевозчик'
        ];
    }
    
    static public function findAll($params = null)
    {
        $data = [];
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setData(isset($params['ScheduleSearch']) ? $params['ScheduleSearch'] : null)
            ->setUrl(Yii::getAlias('@bar').'/api/schedule')
            ->send();
        if ($response->isOk) {
            $data = $response->data;
        }
        return $data;
    }
}