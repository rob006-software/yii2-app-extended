<?php

/* {licenseheader} */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main app assets.
 *
 * @author {author}
 */
class AppAsset extends AssetBundle {

	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/site.css',
	];
	public $js = [
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];

}
