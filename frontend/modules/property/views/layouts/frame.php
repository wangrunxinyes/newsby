<?php
Yii::$app->
	getAssetManager()->publish('@frontend/modules/property/include');
use app\modules\property\assets\PropertyAsset;
$assets = PropertyAsset::register($this);
?>
<?php $this->
	beginPage();?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $this->title; ?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<?php $this->head();?></head>
<body>
	<header>
		<div id="logo">
			<img class="property-master-logo" src="<?php echo $assets->baseUrl . '/img/logo.png'; ?>" alt="logo">
			<label class="property-master-name" >房地产大师</label></div>
		<div id="cd-hamburger-menu">
			<a class="cd-img-replace" href="#0">Menu</a>
		</div>
		<div id="cd-cart-trigger">
			<a class="cd-img-replace" href="#0">Language</a>
		</div>
	</header>

	<nav id="main-nav">
		<ul>
			<li>
				<a href="#0">主页</a>
			</li>
			<li>
				<a class="current" href="#0">游戏介绍</a>
			</li>
			<li>
				<a href="#0">游戏图册</a>
			</li>
			<li>
				<a href="#0">开发者</a>
			</li>
			<li>
				<a href="#0">联系我们</a>
			</li>
		</ul>
	</nav>
	<main>
		<?php $this->
	beginBody();?>
		<?php echo $content; ?>
		<?php $this->endBody();?></main>

	<div id="cd-shadow-layer"></div>

	<div id="cd-cart">
		<h2>购物车</h2>
		<ul class="cd-cart-items">
			<li>
				<span class="cd-qty">1x</span>
				Product Name
				<div class="cd-price">$9.99</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>

			<li>
				<span class="cd-qty">2x</span>
				Product Name
				<div class="cd-price">$19.98</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>

			<li>
				<span class="cd-qty">1x</span>
				Product Name
				<div class="cd-price">$9.99</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>
		</ul>
		<!-- cd-cart-items -->

		<div class="cd-cart-total">
			<p>
				Total
				<span>$39.96</span>
			</p>
		</div>
		<!-- cd-cart-total -->

		<a href="#0" class="checkout-btn">Checkout</a>

		<!-- <p class="cd-go-to-cart">
			<a href="#0">Go to cart page</a>
		</p> -->
	</div>
	<!-- cd-cart -->
</body>
</html>
<?php $this->
	endPage();?>