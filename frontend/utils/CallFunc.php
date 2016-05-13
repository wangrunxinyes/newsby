<?php

namespace frontend\utils;
/**
 *
 */
class CallFunc {

	private $json;
	private $helper;

	function __construct($json, $helper) {
		$this->json = $json;
		$this->helper = $helper;
		if (!isset($this->json->{'data'})) {
			$this->helper->createErrorJson(-5, 'missing parameters error, hit: data');
		}
	}

	function test() {
		return "test success, get data: " . print_r($this->json->{'data'}, true);
	}

	function submitMessage() {
		$message = new \frontend\unit\leaveMessage($this->json->{'data'});
		$message->save();
	}
}

?>