<?php

namespace app\controllers;

use Yii;
use app\models\search\ScheduleSearch;
use app\models\Schedule;

class ScheduleController extends \yii\web\Controller {
    
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionEdit($id = null)
    {
        $data = Yii::$app->request->post();
        if (!$id) {
            $model = new Schedule();
            
            if ($model->load($data)) {
                print_r($model);
            }
        }
        
        return $this->render('edit', [ 'model' => $model ]);
    }
    
    public function actionRemove()
    {
        
    }
}