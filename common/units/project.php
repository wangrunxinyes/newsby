<?php

namespace common\units;
use common\units\basic;

class project extends basic {
	
	public static $PROJECT_HIDE = 0;
	public static $PROJECT_FINISH = 1;
	public static $PROJECT_INPROGRESS = 2;
	
	function __construct() {
		$this->identify = 'basicproject';
		$this->attributes = array (
				'author' => [ 
						'required' 
				],
				'name' => [ 
						'required' 
				],
				'status' => [ 
						'required',
						'int'
				],
				'type' => [ 
						'required' 
				],
				'startdate' => [ 
						'required' 
				],
				'enddate' => [ 
						'required',
						'int' 
				],
				'coverimg' => [ 
						'required' 
				],
				'description' => [ 
						'required' 
				],
				'bigimg' => [ 
						'required' 
				],
				'specialurl' => [ ] 
		);
		parent::__construct ();
	}
}

?>