<?php

namespace common\units;

use common\units\basic;

class packages extends basic {
	public static $PACKAGE_ON = 0;
	public static $PACKAGE_OFF = 1;
	function __construct() {
		$this->identify = 'packages';
		$this->attributes = array (
				'status' => [ 
						'required' 
				],
				'tour_id' => [ 
						'required' 
				],
				'data' => [ 
						'required' 
				],
				'createtime' => [ 
						'required',
						'int',
				],
				'lastedittime' => [ 
						'required',
						'int',
				] 
		);
		parent::__construct ();
	}
	function saveSubmit($tour_id, $data){
		$this->set('status', packages::$PACKAGE_ON);
		$this->set('createtime', time());
		$this->set('lastedittime', time());
		$this->set('tour_id',$tour_id);
		$this->set('data', $data);
		return $this->save();
	}
	public static function getAllCategories() {
		$attributes = array ();
		$attributes ['clothes'] = array (
				's',
				'u',
				'c',
				't',
				'sh',
		);
		
		$attributes ['item'] = array (
				'macbook',
				'mouse',
				'ipad',
				'phone',
				'chargeline_ios',
				'chargeline_android',
				'charger',
				'htc_RE',
				'mobilecharge',
		);
		
		$attributes ['cards'] = array (
				'oct',
				'keys',
				'id_hk',
				'id_CHN',
				'passport_hk',
				'passport',
				'shenzhenOct',
				'bankcard',
				'rmb',
				'hkd'
		);
		
		return $attributes;
	}
	public static function getNames($parameter) {
		if($parameter == "htc_RE"){
			return 'htc RE';
		}
	
		if ($parameter == "id_hk") {
			return '香港身份证';
		}
		
		if ($parameter == "id_CHN") {
			return "内地身份证";
		}
		
		if ($parameter == "oct") {
			return "八达通";
		}
		
		if ($parameter == "keys") {
			return "钥匙";
		}
		
		if ($parameter == "passport_hk") {
			return "港澳通行证";
		}
		
		if ($parameter == "passport") {
			return "护照";
		}
		
		if ($parameter == "shenzhenOct") {
			return "深圳通";
		}
		
		if ($parameter == "bankcard") {
			return "银行卡";
		}
		
		if ($parameter == "rmb") {
			return "人民币";
		}
		
		if ($parameter == "hkd") {
			return "港币";
		}
		
		if ($parameter == "clothes") {
			return "衣物";
		}
		
		if ($parameter == "s") {
			return "袜子";
		}
		
		if ($parameter == "u") {
			return "内裤";
		}
		
		if ($parameter == "c") {
			return "上衣";
		}
		
		if ($parameter == "t") {
			return "裤子";
		}
		
		if ($parameter == "sh") {
			return "鞋子";
		}
		
		if ($parameter == "phone") {
			return "手机";
		}
		
		if ($parameter == "chargeline_ios") {
			return "iphone充电线";
		}
		
		if ($parameter == "chargeline_android") {
			return "Android充电线";
		}
		
		if ($parameter == "mobilecharge") {
			return "移动电源";
		}
		
		if ($parameter == "charger") {
			return "手机充电器";
		}
		
		if ($parameter == "macbook") {
			return "macbook、充电器";
		}
		
		if ($parameter == "mouse") {
			return "鼠标";
		}
		
		if ($parameter == "item") {
			return "电子设备";
		}
		
		if ($parameter == "item") {
			return "物品";
		}
		
		if ($parameter == "cards") {
			return "证件、卡";
		}
		
		return $parameter;
	}
}

?>