<?php

/* {licenseheader} */

use yii\console\controllers\ServeController;
use yii\faker\FixtureController;

Yii::setAlias('@webroot', APP_ROOT . '/public');
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
		'serve' => [
			'class' => ServeController::class,
			'docroot' => '@webroot',
		],
	],
];
