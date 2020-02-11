<?php

/* {licenseheader} */

const IS_WEB = APP_CONTEXT === 'web';
const IS_CONSOLE = APP_CONTEXT === 'console';

error_reporting(-1);

require __DIR__ . '/bootstrap-local.php';
