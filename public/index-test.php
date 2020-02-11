<?php

/* {licenseheader} */

use yii\helpers\ArrayHelper;
use yii\web\Application;

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'], true)) {
	die('You are not allowed to access this file.');
}

const APP_CONTEXT = 'web';
define('APP_ROOT', dirname(__DIR__));

define('ENV', 'test');
define('YII_ENV', 'test');
define('YII_DEBUG', true);

require APP_ROOT . '/vendor/yiisoft/yii2/Yii.php';
require APP_ROOT . '/vendor/autoload.php';

require APP_ROOT . '/config/bootstrap.php';

/* @noinspection PhpIncludeInspection */
$config = ArrayHelper::merge(
	require APP_ROOT . '/tests/config/0-main.php',
	require APP_ROOT . '/tests/config/1-' . APP_CONTEXT . '.php',
	require APP_ROOT . '/tests/config/2-local.php'
);

(new Application($config))->run();
