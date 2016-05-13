<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii;
use yii\helpers\Url;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {
	public $sourcePath = '@web/include/extensions/home/';
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
	];
	public $js = [
		'js/bootstrap.min.js',
	];
	public $depends = [
// 		'yii\web\JqueryAsset',
// 		'yii\web\YiiAsset',
// 		'yii\bootstrap\BootstrapAsset',
	];

	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

	public static function addScript($view, $jsfile) {
		$view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
	}

	public static function addCss($view, $cssfile) {
		$view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
	}

	public static function getBasicUrl() {
		$basic = Url::to(['/include']);

		if (strlen($basic) < 3) {
			$basic = "http://" . $_SERVER['HTTP_HOST'];
		}

		if (strlen($basic) < 3) {
			$basic = "http://www.wangrunxin.com";
		}
		return $basic;
	}

	public static function getUrlPath($filePath) {
		if (substr($filePath, 0, 1) == "/") {
			return self::getBasicUrl() . $filePath;
		} else {
			return self::getBasicUrl() . "/" . $filePath;
		}

	}
}
