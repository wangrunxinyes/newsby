<?php

namespace app\modules\project\assets;

use yii\web\AssetBundle;

class ProjectAsset extends AssetBundle {
	public $sourcePath = '@frontend/modules/project/include';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/bootstrap.css',
			'css/bootstrap-responsive.css',
			// 'css/default.css',
			'css/gridex.css' 
	];
	public $js = [ 
			'js/bootstrap-gridex.min.js' 
	];
	public $depends = [ 
			'yii\web\JqueryAsset' 
	]
	// 'yii\bootstrap\BootstrapAsset'
	;
	public static function register($view) {
		$view->title = "Project | 项目";
		return Parent::register($view);
	}
}