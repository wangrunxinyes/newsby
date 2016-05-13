<?php

namespace frontend\assets;

use yii;
use yii\helpers\Url;
use yii\web\AssetBundle;

class WangAsset extends AssetBundle {
	public $sourcePath = '@web/include/';
	public $basePath = '@webroot';
	public $baseUrl = '@web/include/';
	public $css = [
		'extensions/index/css/bootstrap.css',
		'extensions/index/fonts/font-awesome/css/font-awesome.css',
		'extensions/index/css/owl.carousel.css',
		'extensions/index/css/owl.theme.css',
		'extensions/index/css/style.css',
		'extensions/index/css/prettyPhoto.css',
		'global/css/dialog.css',
	];
	public $js = [
		'frame.layout/js/jquery.min.js',
		'extensions/index/js/bootstrap.js',
		'extensions/index/js/SmoothScroll.js',
		'extensions/index/js/jquery.prettyPhoto.js',
		'extensions/index/js/jquery.isotope.js',
		'extensions/index/js/jquery.counterup.js',
		'extensions/index/js/waypoints.js',
		'extensions/index/js/jqBootstrapValidation.js',
		'extensions/index/js/owl.carousel.js',
		'global/scripts/json2.js',
		'global/scripts/dialog.js',
		'extensions/index/js/main.js',
		'extensions/index/js/submitForm.js',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];

	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

	public static function getBasicUrl() {
		$basic = Url::to(['/include']);

		if (strlen($basic) < 3) {
			$basic = "http://" . $_SERVER['HTTP_HOST'];
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
