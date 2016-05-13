<?php

use common\models\Log;

define ( "TOKEN", "wangrunxinyes" );

$wechatObj = new wechatCallbackapiTest ();

if (isset ( $_GET ['echostr'] )) {
	Log::logger("receive request for wechat auth");
	$wechatObj->valid ();
} else {
	Log::logger("receive request for wechat msg");
	$wechatObj->responseMsg ();
}

class wechatCallbackapiTest {
	public function valid() {
		$echoStr = $_GET ["echostr"];
		
		if ($this->checkSignature ()) {
			
			echo $echoStr;
			
			exit ();
		}
	}
	private function checkSignature() {
		$signature = $_GET ["signature"];
		
		$timestamp = $_GET ["timestamp"];
		
		$nonce = $_GET ["nonce"];
		
		$token = TOKEN;
		
		$tmpArr = array (
				$token,
				$timestamp,
				$nonce 
		);
		
		sort ( $tmpArr, SORT_STRING );
		
		$tmpStr = implode ( $tmpArr );
		
		$tmpStr = sha1 ( $tmpStr );
		
		if ($tmpStr == $signature) {
			
			return true;
		} else {
			
			return false;
		}
	}
	public function responseMsg() {
		$postStr = null;
		
		if(isset($GLOBALS ["HTTP_RAW_POST_DATA"])){
			$postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];
		}
		
		if (! empty ( $postStr )) {
			
			$postObj = simplexml_load_string ( $postStr, 'SimpleXMLElement', LIBXML_NOCDATA );
			
			$RX_TYPE = trim ( $postObj->MsgType );
			
			switch ($RX_TYPE) {
				
				case "text" :
					
					Yii::app ()->weixin->handleMsg ( $postStr );
					
					break;
				
				case "event" :
					
					Yii::app ()->weixin->handleEvent ( $postStr );
					
					break;
				
				default :
					
					$resultStr = "";
					
					break;
			}
		}else{
			
		}
	}
}

?>