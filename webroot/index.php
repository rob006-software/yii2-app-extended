<?php

/* {licenseheader} */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = yii\helpers\ArrayHelper::merge(
		require(__DIR__ . '/../config/main.php'),
		require(__DIR__ . '/../config/main-' . YII_ENV . '.php'),
		require(__DIR__ . '/../config/web.php'),
		require(__DIR__ . '/../config/web-' . YII_ENV . '.php'),
		require(__DIR__ . '/../config/web-local.php')
);

(new yii\web\Application($config))->run();