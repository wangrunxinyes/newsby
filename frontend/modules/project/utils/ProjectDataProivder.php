<?php

namespace app\modules\project\utils;

use common\utils\DataProivder;
use common\units\project;

class ProjectDataProivder extends DataProivder {
	function __construct() {
		$this->identify = "basicproject";
		parent::__construct ();
	}
	function loadProjctsByType($type) {
		$sql = 'SELECT * FROM ' . $this->identify . ' where status = '.$type. ';';
		return $this->query($sql);
	}
}

?>