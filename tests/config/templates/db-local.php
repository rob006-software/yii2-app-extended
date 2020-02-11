<?php

/* {licenseheader} */

use yii\db\Connection;

/**
 * Database connection credentials for tests on a local installation.
 */
return [
	'class' => Connection::class,
	// test database! Important not to run tests on production or development databases
	'dsn' => 'mysql:host=localhost;dbname=yii2_app_tests',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
];
