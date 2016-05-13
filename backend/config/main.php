<?php
$params = array_merge ( require (__DIR__ . '/../../common/config/params.php'), require (__DIR__ . '/../../common/config/params-local.php'), require (__DIR__ . '/params.php'), require (__DIR__ . '/params-local.php') );

return [ 
		'id' => 'app-backend',
		'basePath' => dirname ( __DIR__ ),
		'controllerNamespace' => 'backend\controllers',
		'bootstrap' => [ 
				'log' 
		],
		'modules' => [ 
				'admin' => [ 
						'class' => 'backend\modules\admin\admin' 
				],
				'weixin' => [ 
						'class' => 'backend\modules\weixin\weixin' 
				],
				'gridview' => [
						'class' => 'kartik\grid\Module',
				],
		],
		'components' => [ 
				'user' => [ 
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true 
				],
				'errorHandler' => [ 
						'errorAction' => 'site/error' 
				],
				'db' => [
						'class' => '\yii\db\Connection',
						'dsn' => 'mysql:host=31.220.110.2;dbname=u502190727_sby',
						'username' => 'u502190727_sby',
						'password' => 'wrx52sby',
						'charset' => 'utf8'
				],
		/*
			        'urlManager' => [
			            'enablePrettyUrl' => true,
			            'showScriptName' => false,
			            'rules' => [
			            ],
			        ],
		*/
	],
		'params' => $params 
];
