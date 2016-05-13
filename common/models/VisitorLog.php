<?php

namespace common\models;

use yii\log\Logger;
use yii;

class VisitorLog extends Logger {
	public $testResult;
	function __construct() {
		$this->testResult = false;
	}
	function test() {
		try {
			self::logger ( "Log test at " . time () );
			$config = require (__DIR__ . '/../config/main.php');
			if (isset ( $config ['components'] ['log'] ['targets'] [1] ['logFile'] )) {
				$log = $config ['components'] ['log'] ['targets'] [1] ['logFile'];
				$log = str_replace ( "common\models", "", dirname ( __file__ ) ) . "backend/" . str_replace ( "@app/", "", $log );
				if (file_exists ( $log )) {
					$this->testResult = true;
					return 'location at: ' . $log;
				} else {
					return 'no log file found at ' . $log;
				}
			} else {
				return 'config file error';
			}
		} catch ( Exception $e ) {
			return $e->getMessage ();
		}
	}
	public static function logger($message) {
		Yii::getLogger ()->log ( $message, Logger::LEVEL_INFO, "visitor" );
	}
}

?>