<?php

namespace common\units;
use common\units\basic;

class tour extends basic {
	
	public static $TOUR_ON = 0;
	public static $TOUR_OFF = 1;
	
	function __construct() {
		$this->identify = 'tour';
		$this->attributes = array (
				'title' => [ 
						'required' 
				],
				'status' => [ 
						'required' 
				],
				'createtime' => [ 
						'required',
						'int'
				],
				'lastedittime' => [
						'required',
						'int'
				],
				'author' => [
				]
		);
		parent::__construct ();
	}
	
	function saveFromSubmit(){
		$this->set('status', tour::$TOUR_ON);
		$this->set('createtime', time());
		$this->set('lastedittime', time());
		if(!isset($_GET['author'])){
			$this->set('author', 'default');
		}
		return parent::saveFromSubmit();
	}
}

?>