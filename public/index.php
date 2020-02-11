<?php

/* {licenseheader} */

use yii\helpers\ArrayHelper;
use yii\web\Application;

const APP_CONTEXT = 'web';
define('APP_ROOT', dirname(__DIR__));

require APP_ROOT . '/config/env-local.php';

require APP_ROOT . '/vendor/yiisoft/yii2/Yii.php';
require APP_ROOT . '/vendor/autoload.php';

require APP_ROOT . '/config/bootstrap.php';
/* @noinspection PhpIncludeInspection */
$config = ArrayHelper::merge(
	require APP_ROOT . '/config/0-main.php',
	require APP_ROOT . '/config/1-' . APP_CONTEXT . '.php',
	require APP_ROOT . '/config/2-' . ENV . '.php',
	require APP_ROOT . '/config/3-local.php'
);

(new Application($config))->run();
