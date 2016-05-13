<?php
use yii\helpers\Html;
use frontend\assets\IndexAsset;
use yii\helpers\Url;

$asset = IndexAsset::register ( $this );
?>

<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a>
				<h1 class="brand">
					<a href="index.html" tppabs="#">Helen Shi</a>
				</h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
					<ul id="menu-main" class="nav">
						<li><a title="team" href="#about">About</a></li>
						<li><a title="avocation" href="#avocation">Avocation</a></li>
						<li><a title="life" href="#life">Life</a></li>
						<!-- 					<li>
							<a title="blog" href="#blog">Blog</a>
						</li>
						-->
						<li style="display: none"><a title="contact" href="#contact">Contact</a></li>
						<li><a href="<?php echo Url::to('tour/default')?>">More</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Header area -->
<div id="header-wrapper" class="header-slider">
	<header class="clearfix">
		<div class="logo">
			<img src="<?php echo $asset->baseUrl.("/img/logo-image.png"); ?>"
				alt="" />
		</div>
		<div class="container">
			<div class="row">
				<div class="span12">
					<div id="main-flexslider" class="flexslider">
						<ul class="slides">
							<li>
								<p class="home-slide-content">
									one <strong>passion</strong> girl
								</p>
							</li>
							<li>
								<p class="home-slide-content">
									❤delicious <strong>food</strong>
								</p>
							</li>
							<li>
								<p class="home-slide-content">
									<strong>curious</strong> like a cat
								</p>
							</li>
						</ul>
					</div>
					<!-- end slider -->
				</div>
			</div>
		</div>
	</header>
</div>
<!-- spacer section -->
<!-- <section class="spacer green">
<div class="container">
	<div class="row">
		<div class="span6 alignright flyLeft">
			<blockquote class="large">
				There's huge space beetween creativity and imagination
				<cite>Mark Simmons, Nett Media</cite>
			</blockquote>
		</div>
		<div class="span6 aligncenter flyRight"> <i class="icon-coffee icon-10x"></i>
		</div>
	</div>
</div>
</section>
-->
<!-- end spacer section -->
<!-- section: team -->
<section id="about" class="section">
	<div class="container">
		<h4>Who Am I</h4>
		<div class="row">
			<div class="span4 offset1">
				<div>
					<h2>
						I'm a <strong>energetic</strong> girl
					</h2>
					<p>I like travel and sports, especially running and climb. Besides,
						as a girl of software engineerning major, I familiar with computer
						and love to play computer game.</p>
					<a href="<?php echo Url::to("site/resume")?>" data-filter="*"
						class="btn btn-theme pull-left">Resume and more </a>
				</div>
			</div>
			<div class="span6">
				<div class="aligncenter">
					<img
						src="<?php echo $asset->baseUrl.("/img/icons/creativity.png"); ?>"
						alt="" />
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->
</section>
<!-- end section: team -->
<!-- section: avocation -->
<section id="avocation" class="section orange">
	<div class="container">
		<h4>Avocation</h4>
		<!-- Four columns -->
		<div class="row">
			<div class="span3 animated-fast flyIn">
				<div class="service-box">
					<img src="<?php echo $asset->baseUrl.("/img/icons/laptop.png"); ?>"
						alt="" />
					<h2>Computer Games</h2>
					<p>I love to play games but still a newbie.</p>
				</div>
			</div>
			<div class="span3 animated flyIn">
				<div class="service-box">
					<img src="<?php echo $asset->baseUrl.("/img/icons/lab.png"); ?>"
						alt="" />
					<h2>something new</h2>
					<p>New technology makes me looking forward to the future.</p>
				</div>
			</div>
			<div class="span3 animated-fast flyIn">
				<div class="service-box">
					<img src="<?php echo $asset->baseUrl.("/img/icons/camera.png"); ?>"
						alt="" />
					<h2>Travel</h2>
					<p>I love to travel and take photoes.</p>
				</div>
			</div>
			<div class="span3 animated-slow flyIn">
				<div class="service-box">
					<img src="<?php echo $asset->baseUrl.("/img/icons/basket.png"); ?>"
						alt="" />
					<h2>Buy and buy</h2>
					<p>New clothes, shoes and every beautiful things are all mine, LOL.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end section: avocation -->
<!-- section: life -->
<section id="life" class="section">
	<div class="container clearfix">
		<h4>Wonderful Life</h4>
		<!-- portfolio filter -->
		<div class="row">
			<div id="filters" class="span12">
				<ul class="clearfix">
					<li><a href="#" data-filter="*" class="active">
							<h5>All</h5>
					</a></li>
					<li><a href="#" data-filter=".cat">
							<h5>My Cat</h5>
					</a></li>
					<li><a href="#" data-filter=".view">
							<h5>Scenery</h5>
					</a></li>
					<li><a href="#" data-filter=".food">
							<h5>Food</h5>
					</a></li>
					<li><a href="#" data-filter=".family">
							<h5>Myself</h5>
					</a></li>
				</ul>
			</div>
			<!-- END PORTFOLIO FILTERING -->
		</div>
		<div class="row">
			<div class="span12">
				<div id="portfolio-wrap">
					<!-- portfolio item -->
					<div class="portfolio-item grid print view">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i3/112258296/TB2_cFclXXXXXbsXpXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i3/112258296/TB2wMxelXXXXXbkXpXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Fish boat in SaiKung</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid print design food">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i2/112258296/TB28UNBlXXXXXa3XXXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i4/112258296/TB27lNElXXXXXaMXXXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Sea Food in SaiKung</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid print view">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i2/112258296/TB2wDhulXXXXXccXXXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i3/112258296/TB2nB4klXXXXXXTXpXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>View of SaiKung</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid photography family">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i2/112258296/TB2kQBilXXXXXakXpXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i1/112258296/TB2vldhlXXXXXanXpXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Myself</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid photography cat">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i3/112258296/TB2AUdKlXXXXXXKXXXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i4/112258296/TB2ZEhalXXXXXbOXpXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Lovely Cat</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid photography family">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i1/112258296/TB20qBXlXXXXXbPXpXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i2/112258296/TB2z1FKlXXXXXXRXXXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Myself in South Korea</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid photography cat">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i1/112258296/TB2f3RBlXXXXXblXXXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i4/112258296/TB26ZhHlXXXXXamXXXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>My cat - miumiu</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid food">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i2/112258296/TB2nURKlXXXXXXLXXXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i1/112258296/TB2Rj4qlXXXXXcVXXXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Snack of South Korea</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid photography view">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i4/112258296/TB2Pe8hlXXXXXX_XpXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i2/112258296/TB2XjFylXXXXXaZXXXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Phoenix island in Sanya</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
					<!-- portfolio item -->
					<div class="portfolio-item grid food">
						<div class="portfolio">
							<a
								href="https://img.alicdn.com/imgextra/i2/112258296/TB24YlclXXXXXbmXpXXXXXXXXXX_!!112258296.jpg"
								data-pretty="prettyPhoto[gallery1]" class="portfolio-image"> <img
								src="https://img.alicdn.com/imgextra/i4/112258296/TB2RsdclXXXXXbpXpXXXXXXXXXX_!!112258296.jpg"
								alt="" />
								<div class="portfolio-overlay">
									<div class="thumb-info">
										<h5>Delicious meat soup</h5>
										<i class="icon-plus icon-2x"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<!-- end portfolio item -->
				</div>
			</div>
		</div>
	</div>
</section>
<section id="contact" class="section green" style="display:none;">
	<div class="container">
		<h4>Get in Touch</h4>
		<p></p>
		<div class="blankdivider30"></div>
		<div class="row">
			<div class="span12">
				<div class="cform" id="contact-form">
					<div id="sendmessage">Your message has been sent. Thank you!</div>
					<form action="contact/contact.php" method="post"
						class="contactForm">
						<div class="row">
							<div class="span6">
								<div class="field your-name">
									<input type="text" name="your-name" placeholder="Your Name"
										class="cform-text" size="40" data-rule="maxlen:4"
										data-msg="Please enter at least 4 chars" />
									<div class="validation"></div>
								</div>
								<div class="field your-email">
									<input type="text" name="your-email" placeholder="Your Email"
										class="cform-text" size="40" data-rule="email"
										data-msg="Please enter a valid email" />
									<div class="validation"></div>
								</div>
								<div class="field subject">
									<input type="text" name="subject" placeholder="Subject"
										class="cform-text" size="40" data-rule="maxlen:4"
										data-msg="Please enter at least 8 chars of subject" />
									<div class="validation"></div>
								</div>
							</div>
							<div class="span6">
								<div class="field message">
									<textarea name="message" class="cform-textarea" cols="40"
										rows="10" data-rule="required"
										data-msg="Please write something for us"></textarea>
									<div class="validation"></div>
								</div>
								<input type="submit" value="Send message"
									class="btn btn-theme pull-left">
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- ./span12 -->
		</div>
	</div>
</section>
<footer>
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<ul class="social-networks" style="display:none;">
					<li><a href="#"> <i
							class="icon-circled icon-bgdark icon-instagram icon-2x"></i>
					</a></li>
					<li><a href="#"> <i
							class="icon-circled icon-bgdark icon-twitter icon-2x"></i>
					</a></li>
					<li><a href="#"> <i
							class="icon-circled icon-bgdark icon-dribbble icon-2x"></i>
					</a></li>
					<li><a href="#"> <i
							class="icon-circled icon-bgdark icon-pinterest icon-2x"></i>
					</a></li>
				</ul>
				<p class="copyright">Copyright &copy; 2015.Helen Shi All rights
					reserved.</p>
			</div>
		</div>
	</div>
	<!-- ./container -->
</footer>
<a href="#" class="scrollup"> <i
	class="icon-angle-up icon-square icon-bgdark icon-2x"></i>
</a>