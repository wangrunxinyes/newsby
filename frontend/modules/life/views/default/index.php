<?php
$this->title = 'Life';
use yii\helpers\Url;
use app\modules\life\assets\LifeAsset;

$asset = LifeAsset::register($this);

?>
<div class="site-index" style="text-align: center;">

    <div class="jumbotron">
        <h1>Welcome! <?php echo Yii::$app->user->identity->username; ?></h1>

        <p class="lead">Today is <?php echo date("Y-m-d" ,time());?>.</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['admin/default/index']); ?>">Get started with control pannel</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Visitors</h2>

                <p>Show all visitors history, including IP, visit time and count.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Messages</h2>

                <p>Show all messages.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Sub-systems</h2>

                <p>Control sub-systems.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
