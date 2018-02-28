<?php

return [
    'class' => 'yii\db\Connection',
    // 'dsn' => env('DB_DSN', 'sqlite:/path/to/database/file'),
    'dsn' => 'mysql:host=' . env('DB_HOST', 'localhost') . ';dbname=' . env('DB_NAME', 'yii2basic'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8',
];