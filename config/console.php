<?php
return [
    'id' => 'husky-jam',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => require(__DIR__ . '/db.php')
    ]
];