<div style="margin-top: 20px;">
<?php
// register assets;
use backend\assets\TableAsset;
use common\models\Visitor;
use kartik\grid\EditableColumn;
use kartik\grid\GridView;
use yii\helpers\Html;

$assets = TableAsset::register ( $this );
$this->title = "Visitor | 访客";
if (isset ( $_GET ['trace'] )) {
	$id = base64_decode ( $_GET ['trace'] );
}

use yii\data\ActiveDataProvider;

$query = Visitor::find ()->where ( [ 
		'status' => 0 
] );

$provider = new ActiveDataProvider ( [ 
		'query' => $query,
		'pagination' => [ 
				'pageSize' => 10 
		],
		'sort' => [ 
				'defaultOrder' => [ 
						'lastvisittime' => SORT_DESC,
						'ip' => SORT_ASC 
				] 
		] 
] );

$searchModel = $provider->getModels ();

$gridColumns = [
		// the name column configuration
		[ 
				'attribute' => 'id',
				'header' => 'ID',
				'width' => '80px',
				'hAlign' => 'center',
				'vAlign' => 'middle' 
		],
		[ 
				'class' => 'kartik\grid\DataColumn',
				'attribute' => 'ip',
				'header' => 'ip',
				'pageSummary' => true,
				'width' => '150px',
				'hAlign' => 'center',
				'format' => 'html',
				'vAlign' => 'middle',
				'value' => function ($data) {
					return Html::a ( print_r ( $data->ip, true ), [ 
							'default/ip?ip='. $data->ip
					], [ 
							'class' => 'btn btn-default',
							'target'=> '_blank',
							'title' => 'IP Details' 
					] );
				} 
		],
		[
		'attribute' => 'total',
		'header' => 'Total Visit Count',
		'width' => '150px',
		'hAlign' => 'center',
		'vAlign' => 'middle'
				],
		[ 
				'header' => 'Vip Visit Count',
				'attribute' => 'vip',
				'width' => '150px',
				'hAlign' => 'center',
				'vAlign' => 'middle' 
		],
		[ 
				'attribute' => 'lastvisittime',
				'header' => 'Last Visit Time',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'format' => [ 
						'date',
						'php:Y-m-d H:i:s' 
				],
				'width' => '250px',
				'pageSummary' => true 
		],
		[ 
				'attribute' => 'createtime',
				'header' => 'Create Time',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'width' => '250px',
				'format' => [ 
						'date',
						'php:Y-m-d H:i:s' 
				],
				'pageSummary' => true 
		],
		[ 
				'attribute' => 'status',
				'header' => 'Status',
				'width' => '100px',
				'hAlign' => 'center',
				'vAlign' => 'middle' 
		],
		[ 
				'class' => 'kartik\grid\ActionColumn',
				'template' => '{view}{update}{delete}',
				'urlCreator' => function ($action, $model, $key, $index) {
					return $action . "tour?id=" . $model->id;
				},
				
				'width' => '100px',
				'template' => '{view}{update}{delete}',
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'viewOptions' => [ 
						'title' => 'View',
						'data-toggle' => 'tooltip' 
				],
				'updateOptions' => [ 
						'title' => 'Edit',
						'data-toggle' => 'tooltip' 
				],
				'deleteOptions' => [ 
						'title' => 'Delete',
						'data-toggle' => 'tooltip' 
				],
				'headerOptions' => [ 
						'class' => 'kartik-sheet-style' 
				] 
		] 
];

echo GridView::widget ( [ 
		'dataProvider' => $provider,
		'columns' => $gridColumns,
		'responsive' => true,
		'hover' => true,
		'export' => false,
		'pjax' => true,
		'autoXlFormat' => true,
		'panel' => [ 
				'type' => 'primary',
				'heading' => 'Visitor | 访客' 
		],
		'pjaxSettings' => [ 
				'neverTimeout' => true,
				'beforeGrid' => '',
				'afterGrid' => '' 
		],
		'containerOptions' => [ 
				'style' => 'overflow: auto' 
		], // only set when $responsive = false
		'headerRowOptions' => [ 
				'class' => 'kartik-sheet-style' 
		],
		'filterRowOptions' => [ 
				'class' => 'kartik-sheet-style' 
		],
		'toolbar' => [ 
				[ 
						'content' => Html::a ( '<i class="glyphicon glyphicon-repeat"></i>', [ 
								'default/message' 
						], [ 
								'class' => 'btn btn-default',
								'title' => 'refresh' 
						] ) 
				] 
		],
		// '{export}',
		// '{toggleData}'
		// 'floatHeader'=>true,
		'floatHeaderOptions' => [ 
				'scrollingTop' => '20' 
		] 
] );

?></div>