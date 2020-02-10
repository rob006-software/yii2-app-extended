<?php

/* {licenseheader} */

use app\models\User;
use yii\helpers\ArrayHelper;

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
		'@tests' => '@app/tests',
	],
	'components' => [
		'db' => require __DIR__ . '/testdb-local.php',
		'mailer' => [
			'useFileTransport' => true,
		],
		'assetManager' => [
			'basePath' => __DIR__ . '/../public/assets',
		],
		'urlManager' => [
			'showScriptName' => true,
		],
		'user' => [
			'identityClass' => User::class,
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
	'params' => require __DIR__ . '/params.php',
];

return ArrayHelper::merge($config, require __DIR__ . '/test-local.php');
