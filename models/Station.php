<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

class Station extends \yii\base\Model {
    
    public $id;
    public $name;
    
    static public function findAll()
    {
        $data = [];
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl(Yii::getAlias('@bar').'/api/station')
            ->send();
        if ($response->isOk) {
            $data = $response->data;
        }
        return $data;
    }
}