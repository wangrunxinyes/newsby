<?php

namespace app\modules\blog\assets;

use yii\web\AssetBundle;

class BlogAsset extends AssetBundle {
	public $sourcePath = '@frontend/modules/blog/include';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/bootstrap.css',
			'css/bootstrap-responsive.css',
// 			'css/default.css',
			'css/gridex.css'
	];
	public $js = [ 		
			'js/bootstrap-gridex.min.js',
	];
	public $depends = [ 
			'yii\web\JqueryAsset',
// 			'yii\bootstrap\BootstrapAsset' 
	];
}