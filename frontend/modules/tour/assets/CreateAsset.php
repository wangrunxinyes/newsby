<?php

namespace app\modules\tour\assets;

use yii\web\AssetBundle;

class CreateAsset extends AssetBundle {
	public $sourcePath = '@frontend/modules/tour/include/create';
	public $baseUrl = '@webroot';
	public $css = [ 
			'css/style.css',
			'color/default.css',
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
			'yii\bootstrap\BootstrapAsset' 
	];
	public static function register($view) {
		$view->title = "Tour | 新建";
		return Parent::register($view);
	}
}