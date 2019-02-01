<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=finuchet',
    'username' => 'finuchet',
    'password' => 'Qwerty123',
    'charset' => 'utf8',
    'schemaMap' => [
	'pgsql' => [ 'class'=>'yii\db\pgsql\Schema', 'defaultSchema' => 'public' ]
    ],
];
