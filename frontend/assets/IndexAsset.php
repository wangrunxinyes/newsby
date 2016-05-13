<?php

namespace frontend\assets;

use yii;
use yii\web\AssetBundle;

class IndexAsset extends AssetBundle {
	public $sourcePath = '@frontend/plugin/include/frame.layout/';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/bootstrap-responsive.css',
			'css/style.css',
			'color/default.css',
			'css/bootstrap-responsive.css',
			'css/bootstrap-responsive.css',
	];
	public $js = [ 
			'js/jquery.js',
			'js/jquery.scrollTo.js',
			'js/jquery.nav.js',
			'js/jquery.localscroll-1.2.7-min.js',
			'js/bootstrap.js',
			'js/jquery.prettyPhoto.js',
			'js/isotope.js',
			'js/jquery.flexslider.js',
			'js/inview.js',
			'js/animate.js',
			'js/validate.js',
			'js/custom.js',
	];
	public $depends = [ 
// 			'yii\web\JqueryAsset',
// 			'yii\bootstrap\BootstrapAsset',
	];
	public $jsOptions = [ 
			'position' => \yii\web\View::POS_HEAD 
	];
	public static function register($view) {
		$view->title = "Home | 主页";
		return Parent::register($view);
	}
}
