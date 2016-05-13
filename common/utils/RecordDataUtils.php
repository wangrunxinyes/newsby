<?php

namespace common\utils;

use common\models\VisitorLog;

class RecordDataUtils {
	public static function getIp() {
		if (! empty ( $_SERVER ['HTTP_CLIENT_IP'] )) {
			$ip = $_SERVER ['HTTP_CLIENT_IP'];
		} elseif (! empty ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
			$ip = $_SERVER ['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER ['REMOTE_ADDR'];
		}
		return $ip;
	}
	public static function checkVip($controller) {
		if (isset ( $controller->module->requestedRoute )) {
			$actionRoute = $controller->module->requestedRoute;
			$actionId = $controller->module->requestedAction->id;
			if (($actionRoute == "profile/" || $actionRoute == "profile") && $actionId == "index") {
				return true;
			}
		}
		return false;
	}
	public static function storeLog($id, $controller) {
		if (isset ( $controller->module->requestedRoute )) {
			$data = [ 
					'ip' => self::getIp (),
					'visitor_id' => $id,
					'visit_action_route' => $controller->module->requestedRoute,
					'visit_action_id' => $controller->module->requestedAction->id,
					'visit_time' => date ( 'Y-m-d H:i:s' ) 
			];
		} elseif (isset ( $controller->module->controllerNamespace )) {
			$data = [
					'ip' => self::getIp (),
					'visitor_id' => $id,
					'visit_action_route' => $controller->module->controllerNamespace,
					'visit_action_id' => $controller->module->id,
					'visit_time' => date ( 'Y-m-d H:i:s' )
			];
		}else{
			$data = [
					'ip' => self::getIp (),
					'visitor_id' => $id,
					'visit_action_route' => get_class($controller),
					'visit_time' => date ( 'Y-m-d H:i:s' )
			];
		}
		VisitorLog::logger ( json_encode ( $data ) );
	}
}

?>