<?php

/* {licenseheader} */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 *
 * @author {author}
 */
class ContactForm extends Model {

	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

	public function rules(): array {
		return [
			// name, email, subject and body are required
			[['name', 'email', 'subject', 'body'], 'required'],
			// email has to be a valid email address
			['email', 'email'],
			// verifyCode needs to be entered correctly
			['verifyCode', 'captcha'],
		];
	}

	public function attributeLabels(): array {
		return [
			'verifyCode' => 'Verification Code',
		];
	}

	/**
	 * Sends an email to the specified email address using the information collected by this model.
	 * @param string $email The target email address.
	 * @return bool Whether the model passes validation.
	 */
	public function contact($email): bool {
		if ($this->validate()) {
			Yii::$app->mailer->compose()
					->setTo($email)
					->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
					->setReplyTo([$this->email => $this->name])
					->setSubject($this->subject)
					->setTextBody($this->body)
					->send();

			return true;
		}
		return false;
	}

}
