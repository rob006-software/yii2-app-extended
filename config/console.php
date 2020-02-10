<?php

/* {licenseheader} */

use yii\faker\FixtureController;

Yii::setAlias('@webroot', dirname(__DIR__) . '/public');
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
			'class' => FixtureController::class,
		],
	],
];
