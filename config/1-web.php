<?php

/* {licenseheader} */

use app\models\User;

/**
 * Configuration adjustments for web application.
 */
return [
	'id' => 'app-web',
	'components' => [
		'user' => [
			'identityClass' => User::class,
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
	],
];
