<?php

namespace common\units;

use common\models\RedBean;
use yii\base\Exception;
use yii\base\InvalidValueException;

class basic {
	public $db;
	public $attributes;
	public $current;
	public $identify;
	public $testResult;
	function __construct() {
		$this->db = new RedBean ();
		$this->current = array();
		$this->testResult = false;
	}
	function getInput($data) {
		if (isset ( $this->current [$data] )) {
			return $this->current [$data];
		} else {
			return null;
		}
	}
	function getById($id){
		$rdb = $this->db->load($this->identify, $id);
	}
	function convertToItem($rdb){
		foreach ($this->attributes as $key=>$val){
				$this->set($key, $rdb->$key);
		}
	}
	
	function set($key, $value){
		$this->current[$key] = $value;
	}
	function test(){
		foreach ($this->attributes as $key=>$value){
			if(in_array("required", $value)){
				if(in_array("int", $value)){
					$this->set($key, 0);
				}else{
					$this->set($key, "test data");
				}
			}
		}
		$id = $this->save();
		$this->testResult = true;
		return $id;
	}
	function saveFromSubmit(){
		foreach ($this->attributes as $key=>$val){
			if(isset($_GET[$key])){
				$this->set($key, $_GET[$key]);
			}
		}
		return $this->save();
	}
	function save() {
		$unit = $this->db->dispense ( $this->identify );
		if (! is_null ( $this->attributes )) {
			if (is_array ( $this->attributes )) {
				foreach ( $this->attributes as $key => $value ) {
					$data = $this->getInput ( $key );
					if ($this->check ( $data, $value )) {
						$unit->$key = $data;
					} else {
						throw new InvalidValueException ( 'Invalid value[' . $data . '] for key[' . $key . '] with required[' . print_r ( $value, true ) . ']' );
					}
				}
			}
		}
		
		if ($this->getInput ( 'id' ) != null && $this->getInput ( 'id' ) != "") {
			$unit->id = $this->getInput ( 'id' );
		}
		
		$id = $this->db->store ( $unit );
		
		return $id;
	}
	function check($data, $required) {
		$check = true;
		foreach ( $required as $key ) {
			if (! $check) {
				return $check;
			}
			if ($required == "required") {
				if (is_null ( $data )) {
					$check = false;
				}
			}
			
			if(!is_null($data)){
				if ($required == "int"){
					if(!is_int($data)){
						$check = false;
					}
				}
			}
			
		}
		return $check;
	}
}

?>