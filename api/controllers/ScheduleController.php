<?php

namespace app\api\controllers;

use app\api\actions\IndexAction;

class ScheduleController extends \yii\rest\ActiveController {
    
    public $modelClass = 'app\api\models\Schedule';
    
    public function actions()
    {
        $actions = [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];

        return array_merge(parent::actions(), $actions);
    } 
}