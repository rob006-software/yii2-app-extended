<?php

namespace tests\unit\models;

use app\models\ContactForm;
use Codeception\Test\Unit as UnitTest;
use UnitTester;
use yii\mail\MessageInterface;

/**
 * Class ContactFormTest.
 *
 * @author {author}
 */
class ContactFormTest extends UnitTest {

	/** @var UnitTester */
	public $tester;

	private $model;

	public function testEmailIsSentOnContact() {
		/* @var $model ContactForm */
		$this->model = $this->getMockBuilder(ContactForm::class)
			->setMethods(['validate'])
			->getMock();

		$this->model->expects($this->once())
			->method('validate')
			->willReturn(true);

		$this->model->attributes = [
			'name' => 'Tester',
			'email' => 'tester@example.com',
			'subject' => 'very important letter subject',
			'body' => 'body of current message',
		];

		expect_that($this->model->contact('admin@example.com'));

		// using Yii2 module actions to check email was sent
		$this->tester->seeEmailIsSent();

		/* @var $emailMessage MessageInterface */
		$emailMessage = $this->tester->grabLastSentEmail();
		expect('valid email is sent', $emailMessage)->isInstanceOf(MessageInterface::class);
		expect($emailMessage->getTo())->hasKey('admin@example.com');
		expect($emailMessage->getFrom())->hasKey('noreply@example.com');
		expect($emailMessage->getReplyTo())->hasKey('tester@example.com');
		expect($emailMessage->getSubject())->equals('very important letter subject');
		expect($emailMessage->toString())->stringContainsString('body of current message');
	}
}
