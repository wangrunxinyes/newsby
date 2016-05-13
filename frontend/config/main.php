<?php
$params = array_merge ( require (__DIR__ . '/../../common/config/params.php'), require (__DIR__ . '/../../common/config/params-local.php'), require (__DIR__ . '/params.php'), require (__DIR__ . '/params-local.php') );

return [ 
		'id' => 'app-frontend',
		'basePath' => dirname ( __DIR__ ),
		'bootstrap' => [ 
				'log' 
		],
		'controllerNamespace' => 'frontend\controllers',
		'components' => [ 
				'user' => [ 
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true 
				],
				'errorHandler' => [ 
						'errorAction' => 'site/error' 
				],
				'request'=>[
						'class' => 'common\components\Request',
						'web'=> '/frontend/web'
				],
				'urlManager' => [ 
						'enablePrettyUrl' => true,
						'showScriptName' => false,
						'rules' => [ 
								'' => 'site/index',
								// 'test/index/<id:\d+>/<page:\d+>'=>'test/index',
								// 'test/index/<id:\d+>/<cate>'=>'test/index',
								'<_a:(test|test2)>/<id:\d+>' => '<_a>/index' 
						] 
				],
				'db' => [
						'class' => '\yii\db\Connection',
						'dsn' => 'mysql:host=31.220.110.2;dbname=u502190727_sby',
						'username' => 'u502190727_sby',
						'password' => 'wrx52sby',
						'charset' => 'utf8'
				],
		],
		'modules' => [ 
				'cms' => [ 
						'class' => 'frontend\modules\cms\cms' 
				],
				'property' => [ 
						'class' => 'frontend\modules\property\property' 
				],
				'tour' => [
						'class' => 'frontend\modules\tour\tour'
				],
				'life' => [
						'class' => 'frontend\modules\life\life'
				],
				'project' => [
						'class' => 'frontend\modules\project\project',
				],
				'blog' => [
						'class' => 'frontend\modules\blog\blog',
				],
		],
		'params' => $params 
];
