<?php

namespace common\models;

use yii\web\Controller;
use common\utils\RecordDataUtils;

class BasicController extends Controller {
	public function afterAction($action, $result) {
		$ip = RecordDataUtils::getIp ();
		$visitor = Visitor::find ()->where ( [ 
				'ip' => $ip 
		] )->one ();
		if(is_null($visitor)){
			$visitor = new Visitor();
			$visitor->total = 0;
			$visitor->vip = 0;
			$visitor->createtime = time();
			$visitor->status = 0;
			$visitor->ip = $ip;
		}
		
		$visitor->lastvisittime = time();
		$visitor->total += 1;
		//check vip;
		if(RecordDataUtils::checkVip($action->controller)){
			$visitor->vip += 1;
		}
		$visitor->save();
		//RecordDataUtils::storeLog($visitor->id, $action->controller);
		return parent::afterAction($action, $result);
	}
}

?>