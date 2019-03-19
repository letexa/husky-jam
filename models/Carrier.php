<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

class Carrier extends \yii\base\Model {
    
    public $id;
    public $name;
    
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