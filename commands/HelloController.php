<?php

/* {licenseheader} */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author {author}
 */
class HelloController extends Controller {

	/**
	 * This command echoes what you have entered as the message.
	 *
	 * @param string $message The message to be echoed.
	 * @return int Exit code.
	 */
	public function actionIndex($message = 'hello world') {
		echo $message . "\n";

		return ExitCode::OK;
	}
}
