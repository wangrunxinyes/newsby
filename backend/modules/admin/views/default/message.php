<div style="margin-top: 20px;">
<?php
// register assets;
use backend\assets\TableAsset;
use common\models\Message;
use kartik\grid\EditableColumn;
use kartik\grid\GridView;
use yii\helpers\Html;
$assets = TableAsset::register ( $this );
if (isset ( $_GET ['trace'] )) {
	$id = base64_decode ( $_GET ['trace'] );
}

use yii\data\ActiveDataProvider;

$query = Message::find ()->where ( [ 
		'status' => 0 
] );

$provider = new ActiveDataProvider ( [ 
		'query' => $query,
		'pagination' => [ 
				'pageSize' => 10 
		],
		'sort' => [ 
				'defaultOrder' => [ 
						'createtime' => SORT_DESC,
						'email' => SORT_ASC 
				] 
		] 
] );

$searchModel = $provider->getModels ();

$gridColumns = [
		// the name column configuration
// 		[ 
// 				'attribute' => 'id',
// 				'header' => 'ID',
// 				'width' => '80px',
// 				'hAlign' => 'center',
// 				'vAlign' => 'middle' 
// 		],
		[
				// 'class' => 'kartik\grid\EditableColumn',
				'attribute' => 'name',
				'header' => 'Name',
				'pageSummary' => true,
				'width' => '150px',
				'hAlign' => 'center',
				'vAlign' => 'middle' 
		],
		[ 
				'attribute' => 'createtime',
				'header' => 'Create Time',
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
				'attribute' => 'email',
				'header' => 'Email',
				
				'hAlign' => 'center',
				'vAlign' => 'middle',
				'width' => '250px',
				'pageSummary' => true 
		],
		[ 
				'header' => 'Message',
				'attribute' => 'message',
				'width' => '300px',
				'hAlign' => 'center',
				'vAlign' => 'middle'
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
				'heading' => 'Message list' 
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
						'content' =>Html::a ( '<i class="glyphicon glyphicon-repeat"></i>', [ 
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