<?php

namespace app\models\search;

use Yii;
use yii\data\ArrayDataProvider;
use app\models\Schedule;

class ScheduleSearch extends Schedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departure', 'arrival', 'carrier'], 'string']
        ];
    }

    public function search($params)
    {
        $provider = new ArrayDataProvider([
            'allModels' => Schedule::findAll($params),
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
