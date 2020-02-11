<?php

/* {licenseheader} */

// @todo change context to `test`?
define('APP_CONTEXT', 'web');
define('APP_ROOT', dirname(__DIR__));
define('ENV', 'test');
define('YII_ENV', 'test');
define('YII_DEBUG', true);

require_once APP_ROOT . '/vendor/yiisoft/yii2/Yii.php';
require APP_ROOT . '/vendor/autoload.php';

require APP_ROOT . '/config/bootstrap.php';
