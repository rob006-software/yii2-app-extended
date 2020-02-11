<?php

/* {licenseheader} */

use yii\console\controllers\ServeController;

Yii::setAlias('@webroot', APP_ROOT . '/public');
Yii::setAlias('@web', '/');

/**
 * Application configuration shared by console test app.
 */
return [
	'controllerMap' => [
		'serve' => [
			'class' => ServeController::class,
			'docroot' => '@webroot',
		],
	],
];
