<?php

/* {licenseheader} */

use app\assets\AppAsset;
use app\widgets\MainMenu;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>

		<div class="wrap">
			<?= MainMenu::widget() ?>

			<div class="container">
				<?= Breadcrumbs::widget([
					'links' => $this->params['breadcrumbs'] ?? [],
				]) ?>
				<?= $content ?>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; My Company <?= date('Y') ?></p>

				<p class="pull-right"><?= Yii::t('yii', 'Powered by {yii}', [
						'yii' => '<a href="http://www.yiiframework.com/" rel="external">'
							. Yii::t('yii', 'Yii Framework')
							. '</a>',
					]) ?></p>
			</div>
		</footer>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
