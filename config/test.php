<?php

/* {licenseheader} */

/**
 * Application configuration shared by all test types.
 */
$config = [
	'id' => 'app-tests',
	'basePath' => dirname(__DIR__),
	'language' => 'en-US',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'components' => [
		'db' => require(__DIR__ . '/testdb-local.php'),
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
	'params' => require(__DIR__ . '/params.php'),
];

return yii\helpers\ArrayHelper::merge($config, require(__DIR__ . '/test-local.php'));
