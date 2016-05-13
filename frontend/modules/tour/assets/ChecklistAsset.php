<?php

namespace app\modules\tour\assets;

use common\utils\Asset;

class ChecklistAsset extends Asset {
	public $sourcePath = '@frontend/modules/tour/include/checklist';
	public $baseUrl = '@webroot';
	public $css = [ 
			'font/css.css',
			'css/reset.css',
			'css/style.css',
	];
	public $js = [ 
			'js/modernizr.js',
			'js/main.js',
			
	];
	public $depends = [ 
			'yii\web\JqueryAsset',
// 			'yii\bootstrap\BootstrapAsset' 
	];
	public static function register($view) {
		$view->title = "Tour | 备忘录";
		return Parent::register($view);
	}
}