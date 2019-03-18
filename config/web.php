<?php

return [
    'id' => 'husky-jam',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'request' => [
            'cookieValidationKey' => 'jfhdyh7346rghstgr576490gf',
        ],
        'urlManager' => [
            'enablePrettyUrl' =>true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'schedule'],
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
    ],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module'
        ]
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'extensions' => require(__DIR__  . '/../vendor/yiisoft/extensions.php')
];