<?php

namespace app\models\search;

use Yii;
use yii\data\ArrayDataProvider;
use app\models\Station;

class StationSearch extends Station
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string']
        ];
    }

    public function search($params)
    {
        $provider = new ArrayDataProvider([
            'allModels' => Station::findAll($params),
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'attributes' => ['id'],
            ],
        ]);
        
        return $provider;
    }
}
