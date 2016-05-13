<?php

namespace app\modules\life\assets;

use yii\web\AssetBundle;

class LifeAsset extends AssetBundle {
	public $sourcePath = '@frontend/modules/life/include';
	public $baseUrl = '@webroot';
	public $css = [ 
			
	];
	public $js = [ 
			
	];
	public $depends = [ 
			'yii\web\JqueryAsset',
			'yii\bootstrap\BootstrapAsset' 
	];
}