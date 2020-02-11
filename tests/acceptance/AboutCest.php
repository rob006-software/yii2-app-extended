<?php

/* {licenseheader} */

use yii\helpers\Url;

/**
 * Class AboutCest.
 *
 * @author {author}
 */
class AboutCest {

	public function ensureThatAboutWorks(AcceptanceTester $I) {
		$I->amOnPage(Url::toRoute('/site/about'));
		$I->see('About', 'h1');
	}
}
