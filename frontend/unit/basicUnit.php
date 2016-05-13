<?php

namespace frontend\unit;

use common\models\RedBean;

/**
 */
class basicUnit {
	public $attributes;
	public $values;
	public $output;
	public $identify;
	function __construct($json) {
		$this->values = json_decode ( json_encode ( $json ), true );
		$this->output = new \frontend\utils\ApiHelper ();
		$this->checkValue ();
	}
	function checkValue() {
		if (! is_null ( $this->attributes )) {
			if (is_array ( $this->attributes )) {
				foreach ( $this->attributes as $key => $value ) {
					if ($value == "required") {
						if (! isset ( $this->values [$key] )) {
							$this->output->createErrorJson ( - 6, 'missing parameters error, hit: ' . $key );
						}
					}
				}
			}
		}
	}
	function getInput($data) {
		if (isset ( $this->values [$data] )) {
			return $this->values [$data];
		} else {
			return null;
		}
	}
	function save() {
		$db = new RedBean ();
		$unit = $db->dispense ( $this->identify );
		if (! is_null ( $this->attributes )) {
			if (is_array ( $this->attributes )) {
				foreach ( $this->attributes as $key => $value ) {
					$unit->$key = $this->getInput ( $key );
				}
			}
		}
		
		if ($this->getInput ( 'id' ) != null && $this->getInput ( 'id' ) != "") {
			$unit->id = $this->getInput ( 'id' );
		}
		
		$id = $db->store ( $unit );
		
		return $id;
	}
}

?>