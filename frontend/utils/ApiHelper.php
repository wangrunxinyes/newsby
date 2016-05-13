<?php
namespace frontend\utils;
use frontend\utils\CallFunc;

class ApiHelper {

	public $result;

	function __construct() {
		$this->result = array();
	}

	public function analysisCall($json) {
		$json = json_decode($json);
		if (is_null($json)) {
			self::createErrorJson(-2, "submit data type error.");
		} else {
			if (isset($json->{'api'})) {
				$func = new CallFunc($json, $this);
				$action = $json->{'api'};
				try {
					$data = $func->$action();
					self::createJson(1, "execute successfully.", $data);
				} catch (Exception $e) {
					self::createErrorJson(-4, $e->message);
				}
			} else {
				self::createErrorJson(-3, "missing parameters error, hit: api.");
			}
		}
	}

	public function createErrorJson($code, $msg) {
		$this->result['result'] = "false";
		$this->result['code'] = $code;
		$this->result['msg'] = $msg;
		$this->result['request_parameters'] = $_REQUEST;
		self::exportResult();
	}

	public function createJson($code, $msg, $data) {
		$this->result['result'] = "true";
		$this->result['code'] = $code;
		$this->result['msg'] = $msg;
		$this->result['data'] = $data;
		self::exportResult();
	}

	public function exportResult() {
		print_r(json_encode($this->result));
		exit;
	}

}

?>