<?php

namespace app\modules\tour\utils;

use common\models\RedBean;
use common\units\tour;
use common\units\packages;

class TourDataSaver {
	public $db;
	function __construct() {
		$this->db = new RedBean ();
	}
	function save() {
		if (isset ( $_GET ['module'] )) {
			if ($_GET ['module'] == "createtour") {
				$this->saveNewTour();
			} else {
				$obj = new $_GET ['module'] ();
				$obj->saveFromSubmit ();
			}
		}
	}
	function saveNewTour() {
		$obj = new tour();
		$id = $obj->saveFromSubmit ();
		
		$obj = new packages();
		$obj->set("tour_id", $id);
		$obj->set("attributes", $id);
		$data = serialize($_GET);
		$obj->saveSubmit($id, $data);
	}
}

?>