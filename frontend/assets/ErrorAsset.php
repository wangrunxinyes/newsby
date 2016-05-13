<?php

namespace frontend\assets;

use yii;
use yii\web\AssetBundle;

class ErrorAsset extends AssetBundle {
	public $sourcePath = '@frontend/plugin/include/global.style/';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/css.css',
			'css/da84.css',
			'css/normalize.css',
			'css/default.css',
			'css/fakeLoader.css',
	];
	public $js = [ 
		
	];
	public $depends = [ 
// 			'yii\web\JqueryAsset',
// 			'yii\bootstrap\BootstrapAsset',
	];
	public $jsOptions = [ 
			'position' => \yii\web\View::POS_HEAD 
	];
	public static function register($view) {
		$view->title = "Error | 错误";
		return Parent::register($view);
	}
}

