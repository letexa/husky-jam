<?php

namespace app\controllers;
use app\models\search\CarrierSearch;
use app\models\Carrier;

use Yii;

class CarrierController extends \yii\web\Controller {
    
    public function actionIndex()
    {
        $searchModel = new CarrierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $model = new Carrier();
        
        if ($data && $model->load($data) && $model->save()) {
            $this->redirect('/carrier');
        }
        
        return $this->render('create', [ 'model' => $model ]);
    }
    
    public function actionDelete($id)
    {
        Carrier::delete($id);
        $this->redirect('/carrier');
    }
}