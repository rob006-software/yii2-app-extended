<?php

/* {licenseheader} */

namespace app\commands;

use yii\console\Controller;

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
	 * @param string $message The message to be echoed.
	 */
	public function actionIndex($message = 'hello world') {
		echo $message . "\n";
	}

}
