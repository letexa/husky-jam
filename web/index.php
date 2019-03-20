<?php

require  __DIR__ . '/../vendor/autoload.php';
require(__DIR__ . '/../helpers/helpers.php');

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/../');
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', env('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV'));

require  __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

if (YII_DEBUG) {
    ini_set('display_errors', true);
}

$config = require __DIR__ . '/../config/web.php';
(new yii\web\Application($config))->run();
