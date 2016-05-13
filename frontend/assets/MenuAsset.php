<?php

namespace frontend\assets;

use yii;
use yii\web\AssetBundle;

class MenuAsset extends AssetBundle {
	public $sourcePath = '@frontend/plugin/menu';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/menu-reset.css',
			'css/menu-default.css',
			'css/menu.css',
			'css/dialog.css' 
	];
	public $js = [ 
			'js/dialog.min.js',
	];
	public $depends = [ 
			'yii\web\JqueryAsset' 
	];
	public $jsOptions = [ 
			'position' => \yii\web\View::POS_HEAD 
	];
}