<?php

namespace app\controllers;

use Yii;
use app\models\search\ScheduleSearch;

class SiteController extends \yii\web\Controller {
    
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}