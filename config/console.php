<?php

/* {licenseheader} */

Yii::setAlias('@webroot', dirname(__DIR__) . '/webroot');
Yii::setAlias('@web', '/');

/**
 * Configuration adjustments for console application.
 */
return [
	'id' => 'app-console',
	'controllerNamespace' => 'app\commands',
	'controllerMap' => [
		// Fixture generation command line.
		'fixture' => [
			'class' => 'yii\faker\FixtureController',
		],
	],
];
