<?php 
namespace common\utils;
use yii\web\AssetBundle;

class Asset extends AssetBundle{
	public static function addScript($view, $jsfile, $className) {
		$view->registerJsFile($jsfile, [$className, 'depends' => '']);
	}
	
	public static function addCss($view, $cssfile) {
		$view->registerCssFile($cssfile, [$className, 'depends' => '']);
	}
}

?>