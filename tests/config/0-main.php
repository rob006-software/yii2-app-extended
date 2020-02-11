<?php

/* {licenseheader} */

use yii\caching\ArrayCache;

/**
 * Application configuration shared by all test apps.
 */
return [
	'id' => 'app-tests',
	'basePath' => APP_ROOT,
	'runtimePath' => APP_ROOT . '/tests/runtime',
	'language' => 'en-US',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
		'@tests' => APP_ROOT . '/tests',
	],
	'components' => [
		'db' => require __DIR__ . '/db-local.php',
		'mailer' => [
			'useFileTransport' => true,
		],
		'cache' => [
			'class' => ArrayCache::class,
		],
		'assetManager' => [
			'basePath' => APP_ROOT . '/public/assets',
		],
		'urlManager' => [
			'showScriptName' => true,
		],
	],
	'params' => [
		'adminEmail' => 'admin@example.com',
		'senderEmail' => 'noreply@example.com',
		'senderName' => 'Example.com mailer',
	],
];
