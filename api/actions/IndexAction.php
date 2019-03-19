<?php

namespace app\api\actions;

use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\Action;

class IndexAction extends Action
{
    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        return $this->prepareDataProvider();
    }
    
    protected function prepareDataProvider()
    {
        $requestParams = Yii::$app->getRequest()->get();

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $query = $modelClass::find()
                    ->leftJoin('station d', 'schedule.departure_id = d.id')
                    ->leftJoin('station ar', 'schedule.arrival_id = ar.id')
                    ->leftJoin('carrier', 'schedule.carrier_id = carrier.id')
                    ->select('schedule.*, d.name as departure, ar.name as arrival, carrier.name as carrier');
        
        $filter = [];
        
        if (!empty($requestParams['departure'])) {
            $filter['departure_id'] = $requestParams['departure'];
        }
        
        if (!empty($requestParams['arrival'])) {
            $filter['arrival_id'] = $requestParams['arrival'];
        }
        
        if (!empty($requestParams['carrier'])) {
            $filter['carrier_id'] = $requestParams['carrier'];
        }
        
        if (!empty($filter)) {
            $query->andWhere($filter);
        }

        return Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
        ]);

    }
}