<?php

/* {licenseheader} */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

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
		YiiAsset::class,
		BootstrapAsset::class,
	];
}
