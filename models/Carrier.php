<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

class Carrier extends \yii\base\Model {
    
    const TABLE_NAME = 'carrier';
    
    public $id;
    public $name;
    
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
        ];
    }
    
    public function save()
    {
        $data['name'] = $this->name;

        if ($this->validate()) {
            $client = new Client();
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setData($data)
                ->setUrl(Yii::getAlias('@bar').'/api/carrier/create')
                ->send();
        } 
        return true;
    }
    
    static public function delete($id)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('DELETE')
            ->setUrl(Yii::getAlias('@bar').'/api/carrier/delete?id='.(int)$id)
            ->send();
        return true;
    }
    
    static public function findAll()
    {
        $data = [];
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl(Yii::getAlias('@bar').'/api/carrier')
            ->send();
        if ($response->isOk) {
            $data = $response->data;
        }
        return $data;
    }
}