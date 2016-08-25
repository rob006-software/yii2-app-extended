<?php

/* {licenseheader} */

/**
 * Configuration adjustments for web application.
 */
return [
	'id' => 'app-web',
	'components' => [
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
	],
];
