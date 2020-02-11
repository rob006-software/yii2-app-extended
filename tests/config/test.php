<?php

/* {licenseheader} */

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
	require APP_ROOT . '/tests/config/0-main.php',
	require APP_ROOT . '/tests/config/1-' . APP_CONTEXT . '.php',
	require APP_ROOT . '/tests/config/2-local.php'
);
