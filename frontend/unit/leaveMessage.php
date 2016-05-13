<?php

namespace frontend\unit;

use frontend\unit\basicUnit;
use yii;

/**
 */
class leaveMessage extends basicUnit {
	function __construct($json) {
		$this->identify = "leavemessage";
		
		$this->attributes = array (
				"email" => "required",
				"name" => "required",
				"message" => "required",
				"captcha" => "required" 
		);
		
		parent::__construct ( $json );
		if (! $this->checkCaptcha ()) {
			$this->output->createErrorJson ( - 7, 'captcha error' );
		}
	}
	function checkCaptcha() {
		$session = Yii::$app->session;
		if (! $session->isActive) {
			$session->open ();
		}
		if (md5($this->getInput ( 'captcha' )) == $session ['helloweba_math']) {
			return true;
		}
		return false;
	}
}

?>