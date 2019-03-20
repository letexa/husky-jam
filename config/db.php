<?php

if (env('YII_TEST')) {
    $config_db = [
        'class' => '\yii\db\Connection',
        'dsn' => 'mysql:host='.env('TEST_DB_HOST', 'localhost').';dbname='.env('TEST_DB_NAME', 'husky-jam'),
        'username' => env('TEST_DB_USERNAME', 'root'),
        'password' => env('TEST_DB_PASSWORD', 'root'),
        'charset' => 'utf8'
    ];
} else {
    $config_db = [
        'class' => '\yii\db\Connection',
        'dsn' => 'mysql:host='.env('DB_HOST', 'localhost').';dbname='.env('DB_NAME', 'husky-jam'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', 'root'),
        'charset' => 'utf8'
    ];
}

return $config_db;

