<?php
namespace app\modules\property\assets;

use yii\web\AssetBundle;

class PropertyAsset extends AssetBundle {
	public $sourcePath = '@frontend/modules/property/include';
	public $baseUrl = '@webroot';
	public $css = [
		'menu/css/reset.css',
		'menu/css/style.css',
		'css/component.css',
		'css/icons.css',
		'css/normalize.css',
		'css/component.css',
		'css/custom.css',
	];

	public $js = [
		'js/modernizr.custom.js',
		'menu/js/main.js',
	];

	public $depends = [
		'yii\web\JqueryAsset',
	];
}