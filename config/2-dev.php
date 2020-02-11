<?php

/* {licenseheader} */

use yii\debug\Module as DebugModule;
use yii\gii\Module as GiiModule;
use yii\helpers\ArrayHelper;

/**
 * Adjustments for general configuration for development environment.
 */
return (static function () {
	$config = [
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
				'class' => GiiModule::class,
			],
		],
	];

	if (IS_WEB) {
		$config = ArrayHelper::merge($config, [
			'bootstrap' => [
				'debug',
			],
			'modules' => [
				'debug' => [
					'class' => DebugModule::class,
				],
			],
		]);
	}

	return $config;
})();
