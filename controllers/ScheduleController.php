<?php

namespace app\controllers;

use Yii;
use app\models\search\ScheduleSearch;
use app\models\Schedule;
use app\models\Station;

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
        } else {
            $model = Schedule::findOne($id);
        }
        
        if ($data && $model->load($data) && $model->save()) {
            $this->redirect('/');
        }

        $data['model'] = $model;
        $data['station'] = \yii\helpers\ArrayHelper::map(
            \app\models\Station::findAll(), 'id', 'name'
        );
        $data['carrier'] = \yii\helpers\ArrayHelper::map(
            \app\models\Carrier::findAll(), 'id', 'name'
        );
        
        return $this->render('edit', $data);
    }
    
    public function actionDelete($id)
    {
        Schedule::delete($id);
        $this->redirect('/');
    }
}