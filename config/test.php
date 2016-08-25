<?php

/* {licenseheader} */

$params = require(__DIR__ . '/params.php');
$dbParams = require(__DIR__ . '/testdb-local.php');

/**
 * Application configuration shared by all test types.
 */
$config = [
	'id' => 'app-tests',
	'basePath' => dirname(__DIR__),
	'language' => 'en-US',
	'components' => [
		'db' => $dbParams,
		'mailer' => [
			'useFileTransport' => true,
		],
		'urlManager' => [
			'showScriptName' => true,
		],
		'user' => [
			'identityClass' => 'app\models\User',
		],
		'request' => [
			'cookieValidationKey' => 'test',
			'enableCsrfValidation' => false,
			// but if you absolutely need it set cookie domain to localhost
			/*
			'csrfCookie' => [
				'domain' => 'localhost',
			],
			*/
		],
	],
	'params' => $params,
];

return yii\helpers\ArrayHelper::merge($config, require(__DIR__ . '/test-local.php'));
