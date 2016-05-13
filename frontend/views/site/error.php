<?php
use frontend\assets\AppAsset;
use frontend\utils\ApiHelper;
use yii\helpers\Html;
use frontend\assets\ErrorAsset;
$asset = ErrorAsset::register($this);

$request = $this->context->action->controller->module->requestedRoute;
if ($request == "api/call") {
	$apiHelper = new ApiHelper();
	$apiHelper->createErrorJson(0, "no api found or unknown error.");
}

?>

	<main class="content-primary">

		<div class="container">

			<div class="dialog">

				<h1 class="mega">
					</h1>

				<h2 class="subhead">
					Sorry&nbsp;|&nbsp;抱歉
					<br>
					<lable class="description">
						<?=nl2br(Html::encode($message))?></lable>
					<br></h2>

			</div>

			<nav class="nav-choices">

				<div class="options">Your options&nbsp;|&nbsp;你的选择</div>

				<ul>
					<li>
						<a class="btn btn-primary" href="<?php echo AppAsset::getUrlPath(''); ?>">主页 | home</a>
					</li>

					<li id="separator-404" class="separator">&nbsp;&nbsp;</li>
					<li>
						<a class="btn btn-primary" href="#" id="punch-a-moose" >管理员 | Log</a>

					</li>

				</ul>

			</nav>

		</div>

	</main>
