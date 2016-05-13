<?php

namespace common\models;

use yii\db\ActiveRecord;
use common\models\RedBean;
use yii;

class WActiveRecord extends ActiveRecord {
	public $testResult;
	public $attributes;
	function __construct(){
		$this->attributes = array();
	}
	
	public function test() {
		$this->testResult = false;
		$tableSchema = Yii::$app->db->schema->getTableSchema ( $this->tableNameString());
		if(is_null($tableSchema)){
			$db = new RedBean();
			$item = $db->dispense($this->tableNameString());
			$this->fillTestData($item);
			$id = $db->store($item);
			$this->testResult = true;
		}
		$db = new RedBean();
		$item = $db->dispense($this->tableNameString());
		$this->fillTestData($item);
		$id = $db->store($item);
		$this->testResult = true;
		$db->trash( $item ); 
		return $id;
	}
	public function fillTestData($item){
		foreach ( $this->attributes as $key => $value ) {
			if($key != "id"){
				if(strpos($key, 'time') !== false){
					$item->$key = time();
				}else{
					if(in_array('int', $value)){
						$item->$key = 0;
					}else{
						$item->$key = "test-".$key;
					}
					
				}
			}
			
		}
	}
}

?>