<?php

/* {licenseheader} */

use app\models\User;

/**
 * Application configuration shared by web test app.
 */
return [
	'components' => [
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
];
