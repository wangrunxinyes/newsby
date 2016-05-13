<?php
return [ 
		'vendorPath' => dirname ( dirname ( __DIR__ ) ) . '/vendor',
		'components' => [ 
				'log' => [ 
						'targets' => [ 
								[ 
										'class' => 'yii\log\FileTarget',
										'levels' => [ 
												'info' 
										],
										'categories' => [ 
												'custom' 
										],
										'logFile' => '@app/runtime/logs/custom.log',
										
										'maxFileSize' => 1024 * 2,
										'maxLogFiles' => 20 
								],
								[
								'class' => 'yii\log\FileTarget',
								'levels' => [
										'error'
								],
								'logFile' => '@app/runtime/logs/app.log',
								
								'maxFileSize' => 1024 * 2,
								'maxLogFiles' => 20
								]
						] 
				],
				'cache' => [ 
						'class' => 'yii\caching\FileCache' 
				],
				'data' => [ 
						'class' => 'common\helpers\data_helper' 
				],
				'assetManager' => [ 
						'bundles' => [ 
								'yii\web\JqueryAsset' => [ 
										'jsOptions' => [ 
												'position' => \yii\web\View::POS_HEAD 
										] 
								] 
						] 
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
						'dsn' => 'mysql:host=31.220.110.2;dbname=u498749435_prod',
						'username' => 'u498749435_wrx',
						'password' => 'wrx52691',
						'charset' => 'utf8' 
				] 
		] 
];
