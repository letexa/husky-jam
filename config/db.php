<?php

return [
    'class' => '\yii\db\Connection',
    'dsn' => 'mysql:host='.env('DB_HOST', 'localhost').';dbname='.env('DB_NAME', 'husky-jam'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', 'root'),
    'charset' => 'utf8'
];