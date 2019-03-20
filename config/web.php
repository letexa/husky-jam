<?php

Yii::setAlias('@bar', 'http://'.env('BASE_URL'));

return [
    'id' => 'husky-jam',
    'basePath' => realpath(__DIR__ . '/../'),
    'defaultRoute' => 'schedule',
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module'
        ],
        'api' => [
            'class' => 'app\api\ApiModule'
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'request' => [
            'cookieValidationKey' => 'jfhdyh7346rghstgr576490gf',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                ['pattern'=>'schedule/edit/<id>', 'route'=>'schedule/edit'],
                ['pattern'=>'schedule/delete/<id>', 'route'=>'schedule/delete'],
                ['pattern'=>'station/delete/<id>', 'route'=>'station/delete'],
                ['pattern'=>'carrier/delete/<id>', 'route'=>'carrier/delete']
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\user\UserRecord'
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'extensions' => require(__DIR__  . '/../vendor/yiisoft/extensions.php')
];