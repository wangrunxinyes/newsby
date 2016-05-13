<?php

namespace common\models;

use yii;
class System {
	public static function init($type) {
		$sql = 'SELECT * FROM information_schema.tables' . ' WHERE table_schema = "u498749435_prod" AND table_name = "' . $type . '" LIMIT 1;';
		$result = yii::$app->db->createCommand($sql)->queryAll();
		if(is_array($result)){
			if(count($result) != 0){
				return false;
			}
		}
		return true;
	}
	
	public static function getNext($step){
		
		if(is_null($step)){
			return "start";
		}
		
		if($step == "start"){
			return "f_user";
		}
		
		if($step == "f_user"){
			return "user";
		}
	
		return null;
	}
	
	public static function initialize($step){
		$ini = parse_ini_file ( "system.ini", true );
		$table = $ini['tables'][$step];
		if (System::init ( $table )) {
			$sql = $ini [$table]['sql'];
			$result = yii::$app->db->createCommand($sql)->execute();
			if($result == 0){
				echo '<div class="site-index"><div class="jumbotron"><h1><a class="btn btn-lg btn-success" href="/workspace/home/backend/web/site/install?start=access&amp;step=start">Next</a></h1></div></div>';
			}
		} else {
			echo '<div class="site-index"><div class="jumbotron"><h1>Initialize fail.</h1></div></div>';
		}
	}
}
?>