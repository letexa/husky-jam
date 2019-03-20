<?php

namespace app\controllers;

use Yii;
use app\models\search\StationSearch;
use app\models\Station;

class StationController extends \yii\web\Controller {
    
    public function actionIndex()
    {
        $searchModel = new StationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $model = new Station();
        
        if ($data && $model->load($data) && $model->save()) {
            $this->redirect('/station');
        }
        
        return $this->render('create', [ 'model' => $model ]);
    }
    
    public function actionDelete($id)
    {
        Station::delete($id);
        $this->redirect('/station');
    }
}