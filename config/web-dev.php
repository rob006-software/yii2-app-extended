<?php

/* {licenseheader} */

/**
 * Configuration adjustments for installation of web application in development environment.
 */
return [
	'bootstrap' => [
		'debug',
	],
	'modules' => [
		'debug' => [
			'class' => 'yii\debug\Module',
		],
	],
];
