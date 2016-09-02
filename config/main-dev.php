<?php

/* {licenseheader} */

/**
 * Adjustments for general configuration for development environment.
 */
return [
	'bootstrap' => [
		'gii',
	],
	'components' => [
		'db' => [
			'schemaCacheDuration' => 60,
		],
	],
	'modules' => [
		'gii' => [
			'class' => 'yii\gii\Module',
		],
	],
];
