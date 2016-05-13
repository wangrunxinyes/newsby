<?php

namespace common\models;

require_once 'rb.php';
use RedBeanPHP\Facade;

class RedBean extends Facade {
	public $testResult;
	function __construct() {
		$this->testResult = false;		
	}
	function test() {
		try {
			$unit = $this->dispense ( "runxin" );
			$unit->testTime = time ();
			$this->testResult = true;
			return $this->store ( $unit );
		} catch ( Exception $e ) {
			return $e->getMessage ();
		}
	}
	public static function init($type) {
		return self::dispense ( $type );
	}
}

?>