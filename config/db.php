<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=marysienka.pl;dbname=cierczek_psi',
    'username' => 'cierczek_psi',
    'password' => 'zaq12wsx',
    'charset' => 'utf8',
	'attributes' => [
			PDO::ATTR_TIMEOUT =>20,
	]
];
