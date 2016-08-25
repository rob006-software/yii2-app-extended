<?php

/* {licenseheader} */

/**
 * General configuration shared between console and web application.
 */
return [
	'basePath' => dirname(__DIR__),
	'bootstrap' => [
		'log',
	],
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => require(__DIR__ . '/db-local.php'),
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
			],
		],
	],
	'params' => require(__DIR__ . '/params.php'),
];
