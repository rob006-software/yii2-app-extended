<?php

/* {licenseheader} */

use yii\db\Connection as DbConnection;
use yii\helpers\ArrayHelper;
use yii\log\FileTarget;
use yii\swiftmailer\Mailer as SwiftMailer;
use yii\caching\FileCache;

/**
 * General configuration shared between console and web application.
 */
return [
	'basePath' => APP_ROOT . '/app',
	'runtimePath' => APP_ROOT . '/runtime',
	'bootstrap' => [
		'log',
	],
	'aliases' => [
		'@vendor' => APP_ROOT . '/vendor',
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'components' => [
		'cache' => [
			'class' => FileCache::class,
		],
		'mailer' => [
			'class' => SwiftMailer::class,
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
			'viewPath' => APP_ROOT . '/app/mail/views',
		],
		'log' => [
			'targets' => [
				[
					'class' => FileTarget::class,
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => ArrayHelper::merge(
			[
				'class' => DbConnection::class,
				'enableSchemaCache' => true,
			],
			require __DIR__ . '/db-local.php'
		),
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
			],
		],
		'assetManager' => [
			'linkAssets' => true,
		],
	],
	'params' => [
		'adminEmail' => 'admin@example.com',
		'senderEmail' => 'noreply@example.com',
		'senderName' => 'Example.com mailer',
	],
];
