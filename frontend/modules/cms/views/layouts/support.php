<?php

Yii::app()->
	assets->registerGlobalCss("extensions/mobile/styles/style.css");
Yii::app()->assets->registerGlobalCss("extensions/mobile/styles/framework.css");
Yii::app()->assets->registerGlobalCss('extensions/menu.bar/site.css');

Yii::app()->assets->registerGlobalScript("extensions/mobile/scripts/jqueryui.js");
Yii::app()->assets->registerGlobalScript("extensions/mobile/scripts/contact.js");
Yii::app()->assets->registerGlobalScript("extensions/mobile/scripts/custom.js");
Yii::app()->assets->registerGlobalScript("extensions/mobile/scripts/framework.js");
Yii::app()->assets->registerGlobalScript("extensions/mobile/scripts/framework.launcher.js");
Yii::app()->assets->registerGlobalScript('extensions/menu.bar/js/core.js');
Yii::app()->assets->registerGlobalScript('extensions/menu.bar/js/navigation.js');
Yii::app()->assets->registerGlobalScript('extensions/menu.bar/js/mediaquery.js');
Yii::app()->assets->registerGlobalScript('extensions/menu.bar/js/swap.js');

$systemMenu = new SystemMenu();

?>
<!DOCTYPE html>
<html style="" class="js canvas no-touch opacity csstransforms svg" temp-debug="true" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<!-- Page Attributes -->
	<title><?php echo $systemMenu->getSupportLabel();?></title>
	<meta name="description" content=""></head>
<body class="fs-grid fs-grid-sm-fluid">
	<header class="header">
		<a class="logo header_logo" data-analytics-event="Header, Click, logo">
			<?php echo $systemMenu->getSupportLabel();?></a>
		<button data-swap-group="fs-navigation" data-swap-linked="fs-navigation-handle__0" data-swap-target=".fs-navigation__0" class="header_button js-nav_handle fs-navigation-handle fs-navigation-overlay-handle fs-navigation-overlay-right-handle fs-navigation-handle__0 fs-navigation__0 fs-swap-element fs-navigation-enabled">菜单</button>
	</header>
	<div class="wrapper">
		<div class="page js-nav_move fs-navigation-overlay-content fs-navigation__0 fs-navigation-enabled fs-navigation-animated">
			<div id="preloader">
				<div id="status">
					<p class="center-text">
						加载数据中 <em>请稍候</em>
					</p>
				</div>
			</div>
			<?php echo $content;?>
			<aside class="sidebar">
				<nav class="main_nav sidebar_content js-navigation fs-navigation-element fs-navigation-overlay-nav fs-navigation-overlay-right-nav fs-navigation__0 fs-navigation-enabled fs-navigation-animated" data-navigation-handle=".js-nav_handle" data-navigation-content=".js-nav_move" data-navigation-options="{&quot;type&quot;:&quot;overlay&quot;,&quot;gravity&quot;:&quot;right&quot;,&quot;maxWidth&quot;:&quot;10000px&quot;}">
					<h3 style="color:rgb(212, 212, 212)">会员专区</h3>
					<ul>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/membercenter')?>" data-analytics-event="MainNav, Click, start">用户中心
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/assistant')?>" data-analytics-event="MainNav, Click, upgrade">专属顾问
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/medicalbook')?>" data-analytics-event="MainNav, Click, contribute">病历本
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/alert')?>" data-analytics-event="MainNav, Click, contribute">备忘记录
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/alert')?>" data-analytics-event="MainNav, Click, contribute">家庭小药箱
							</a>
						</li>
					</ul>
					<h3 style="color:rgb(212, 212, 212)">我们的服务</h3>
					<ul>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/productlist')?>" data-analytics-event="MainNav, Click, start">我们的产品
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/tips')?>" data-analytics-event="MainNav, Click, contribute">生活小贴士
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/tips')?>" data-analytics-event="MainNav, Click, contribute">健康评测
							</a>
						</li>
						<li style="list-style:none;margin-bottom:0px;">
							<a href="<?php echo Yii::app()->
	assets->getUrlPath('support/about')?>" data-analytics-event="MainNav, Click, upgrade">关于我们
							</a>
						</li>

					</ul>
				</nav>
			</aside>

		</div>
	</div>
	<p class="copyright">
		CopyRight 2015. wangrunxin.com
		<br>All Rights Reserved</p>
	<script type="text/javascript">
	!window.jQuery && document.write('<script src="<?php echo Yii::app()->assets->getUrlPath('assets/global/scripts/jquery.min.js');?>"><\/script>');
	$("nav").navigation({labels: {closed: "菜单", open: "关闭"}});
	</script>
</body>
</html>