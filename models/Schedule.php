<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

class Schedule extends \yii\base\Model {
    
    const TABLE_NAME = 'schedule';
    
    const WEEK = [
        0 => 'пн',
        1 => 'вт',
        2 => 'ср',
        3 => 'чт',
        4 => 'пт',
        5 => 'сб',
        6 => 'вс',
    ];
    
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
    
    public function rules()
    {
        return [
            [['departure_id', 'departure_time', 'arrival_id', 'arrival_time', 'cost', 'carrier_id', 'days'], 'required'],
            [['id', 'departure_id', 'arrival_id', 'carrier_id'], 'integer'],
            [['departure_time', 'arrival_time', 'days'], 'safe'],
            [['cost'], 'number']
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'departure_id' => 'Станция отправления',
            'departure' => 'Станция отправления',
            'departure_time' => 'Время отправления',
            'arrival_id' => 'Станция прибытия',
            'arrival' => 'Станция прибытия',
            'arrival_time' => 'Время прибытия',
            'travel_time' => 'Время в пути (мин)',
            'cost' => 'Цена билета (руб)',
            'days' => 'График движения',
            'carrier_id' => 'Перевозчик',
            'carrier' => 'Перевозчик'
        ];
    }
    
    public function save()
    {
        $data['id'] = $this->id;
        $data['departure_id'] = $this->departure_id;
        $data['departure_time'] = $this->departure_time;
        $data['arrival_id'] = $this->arrival_id;
        $data['arrival_time'] = $this->arrival_time;
        $data['travel_time'] = (strtotime($this->arrival_time) - strtotime($this->departure_time)) / 60;
        $data['cost'] = $this->cost;
        $data['carrier_id'] = $this->carrier_id;
        $data['days'] = serialize($this->days);

        if ($this->validate()) {
            $client = new Client();
            $response = $client->createRequest()
                ->setMethod($this->id ? 'PATCH' : 'POST')
                ->setData($data)
                ->setUrl(Yii::getAlias('@bar').'/api/schedule/' . ($this->id ? 'update?id='.$this->id : 'create'))
                ->send();
        } 
        return true;
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
    
    static public function findOne($id)
    {
        $model = new self();
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setData([ 'id' => (int)$id ])
            ->setUrl(Yii::getAlias('@bar').'/api/schedule/view')
            ->send();

        if ($response->isOk) {
            $data['Schedule'] = $response->data;
            $model->load($data);
            $model->days = unserialize($model->days);
        }
        return $model;
    }
    
    static public function prepareDays($days)
    {
        $result = '';
        
        foreach(unserialize($days) as $key => $day) {
            if ($key > 0) {
                $result .= ', ';
            }
            $result .= self::WEEK[$day];
        }
        
        return $result;
    }
    
    static public function delete($id)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('DELETE')
            ->setUrl(Yii::getAlias('@bar').'/api/schedule/delete?id='.(int)$id)
            ->send();
        return true;
    }
}