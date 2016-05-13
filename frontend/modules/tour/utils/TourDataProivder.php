<?php

namespace app\modules\tour\utils;

use common\utils\DataProivder;

class TourDataProivder extends DataProivder {
	
	function __construct() {
		$this->identify = "basicproject";
		parent::__construct ();
	}
	
	
	function loadPackageByTourId($id, $item) {
		
		return $this->query($sql);
	}
}

?>