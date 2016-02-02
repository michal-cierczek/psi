<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysql.cba.pl;dbname=projektnapsi_cba_pl',
    'username' => 'adminbazki',
    'password' => 'zaq12wsx',
    'charset' => 'utf8',
	'attributes' => [
			PDO::ATTR_TIMEOUT =>20,
	]
];
