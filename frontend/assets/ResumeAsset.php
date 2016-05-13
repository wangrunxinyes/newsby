<?php

namespace frontend\assets;

use yii;
use yii\web\AssetBundle;

class ResumeAsset extends AssetBundle {
	public $sourcePath = '@frontend/plugin/tabstroy';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/default.css',
			'css/component.css',
	];
	public $js = [ 
			'js/modernizr.custom.js',
			'js/jquery.cbpContentSlider.min.js',
	];
	public $depends = [ 
			'yii\web\JqueryAsset',
	];
	public $jsOptions = [ 
			'position' => \yii\web\View::POS_END
	];
	public static function register($view) {
		$view->title = "Resume | 简历";
		return Parent::register($view);
	}
}