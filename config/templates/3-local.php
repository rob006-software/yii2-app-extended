<?php

/* {licenseheader} */

use yii\helpers\ArrayHelper;

/**
 * Configuration adjustments for local installation.
 */
return (static function () {
	$config = [];
	if (IS_WEB) {
		$config = ArrayHelper::merge($config, [
			// uncomment the following to add your IP if you are not connecting from localhost
			//'modules' => [
			//	'debug' => [
			//		'allowedIPs' => ['127.0.0.1', '::1'],
			//	],
			//	'gii' => [
			//		'allowedIPs' => ['127.0.0.1', '::1'],
			//	],
			//],
			'components' => [
				'request' => [
					// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
					'cookieValidationKey' => '',
				],
			],
		]);
	}

	return $config;
})();
