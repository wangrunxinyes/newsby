<?php

namespace frontend\assets;

use yii;
use yii\web\AssetBundle;

class AboutAsset extends AssetBundle {
	public $sourcePath = '@frontend/plugin/bootstrap/include';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/components.css',
	];
	public $js = [ 
	];
	public $depends = [ 
			'yii\web\JqueryAsset',
			'yii\bootstrap\BootstrapAsset',
	];
	public $jsOptions = [ 
			'position' => \yii\web\View::POS_HEAD 
	];
	public static function register($view) {
		$view->title = "About | 关于";
		return Parent::register($view);
	}
}