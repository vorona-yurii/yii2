<?php

return [
    'class' => 'yii\db\Connection',
    // 'dsn' => env('DB_DSN', 'sqlite:/path/to/database/file'),
    'dsn' => 'mysql:host=' . env('DB_HOST', 'localhost') . ';dbname=' . $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',
];