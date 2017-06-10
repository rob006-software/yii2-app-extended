<?php

/* {licenseheader} */

namespace app\widgets;

use Yii;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Widget;

/**
 * Widget for rendering main menu of app.
 *
 * @author {author}
 */
class MainMenu extends Widget {

	/**
	 * {@inheritdoc}
	 */
	public function run() {
		NavBar::begin([
			'brandLabel' => 'My Company',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => $this->getItems(),
		]);
		NavBar::end();
	}

	/**
	 * Generate items list for menu.
	 *
	 * @return array
	 */
	protected function getItems() {
		$items = [
			['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'About', 'url' => ['/site/about']],
			['label' => 'Contact', 'url' => ['/site/contact']],
		];

		if (Yii::$app->user->isGuest) {
			$items[] = ['label' => 'Login', 'url' => ['/site/login']];
		} else {
			$items[] = Html::tag('li', $this->getLogoutButton());
		}

		return $items;
	}

	/**
	 * Generate logout button for menu.
	 *
	 * @return string
	 */
	protected function getLogoutButton() {
		$label = 'Logout (' . Html::encode(Yii::$app->user->identity->username) . ')';
		$output = Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form']);
		$output .= Html::submitButton($label, ['class' => 'btn btn-link']);
		$output .= Html::endForm();

		return $output;
	}

}
