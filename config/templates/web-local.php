<?php

/* {licenseheader} */

/**
 * Configuration adjustments for local installation of web application.
 */
return [
// uncomment the following to add your IP if you are not connecting from localhost
//	'modules' => [
//		'debug' => [
//			'allowedIPs' => ['127.0.0.1', '::1'],
//		],
//		'gii' => [
//			'allowedIPs' => ['127.0.0.1', '::1'],
//		],
//	],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => '',
		],
	],
];
