<?php 
namespace common\utils;
use common\models\RedBean;

class DataProivder{
	public $identify;
	public $db;
	
	function __construct(){
		$this->db = new RedBean();
	}
	
	function query($sql){
		$rows = $this->db->getAll ( $sql );
		return $this->db->convertToBeans ( $this->identify, $rows );
	}
	
	function loadItemBySql($item, $sql) {
		$sql = 'SELECT * FROM ' . $item->identify . ' where status = '.$type. ';';
		return $this->query($sql);
	}
	
}

?>