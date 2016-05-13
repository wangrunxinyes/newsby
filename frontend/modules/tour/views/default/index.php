<?php 
$this->title = "Home";
use app\modules\tour\assets\TourAsset;
use yii\helpers\Url;
$asset = TourAsset::register($this);
?>

<article class="htmleaf-container" style="margin-top: 50px;">
	<header class="htmleaf-header">
		<h1>
			All memories about tour.
		</h1><BR>
		<p><a class="btn btn-lg btn-success" style="margin-right: 50px;" href="<?php echo Url::to("create");?>">Create New Memory</a><a class="btn btn-lg btn-success" href="<?php echo Url::to("packages");?>">Packages</a></p>
	</header>
</article>

<div class="container clearfix">
	<div class="row">
		<div id="filters" class="span12">
			<ul class="clearfix">
				<li>
					<a href="#" data-filter="*" class="active">
						<h5>All</h5>
					</a>
				</li>
				<li>
					<a href="#" data-filter=".cat">
						<h5>My Cat</h5>
					</a>
				</li>
				<li>
					<a href="#" data-filter=".view">
						<h5>Scenery</h5>
					</a>
				</li>
				<li>
					<a href="#" data-filter=".food">
						<h5>Food</h5>
					</a>
				</li>
				<li>
					<a href="#" data-filter=".family">
						<h5>Family</h5>
					</a>
				</li>
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
						<a href="https://img.alicdn.com/imgextra/i3/112258296/TB2_cFclXXXXXbsXpXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i3/112258296/TB2wMxelXXXXXbkXpXXXXXXXXXX_!!112258296.jpg" alt="" />
							<div class="portfolio-overlay">
								<div class="thumb-info">
									<h5>Fish boat in SaiKung</h5> <i class="icon-plus icon-2x"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
				<!-- end portfolio item -->
				<!-- portfolio item -->
				<div class="portfolio-item grid print design food">
					<div class="portfolio">
						<a href="https://img.alicdn.com/imgextra/i2/112258296/TB28UNBlXXXXXa3XXXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i4/112258296/TB27lNElXXXXXaMXXXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i2/112258296/TB2wDhulXXXXXccXXXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i3/112258296/TB2nB4klXXXXXXTXpXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i2/112258296/TB2kQBilXXXXXakXpXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i1/112258296/TB2vldhlXXXXXanXpXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i3/112258296/TB2AUdKlXXXXXXKXXXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i4/112258296/TB2ZEhalXXXXXbOXpXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i1/112258296/TB20qBXlXXXXXbPXpXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i2/112258296/TB2z1FKlXXXXXXRXXXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i1/112258296/TB2f3RBlXXXXXblXXXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i4/112258296/TB26ZhHlXXXXXamXXXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i2/112258296/TB2nURKlXXXXXXLXXXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i1/112258296/TB2Rj4qlXXXXXcVXXXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i4/112258296/TB2Pe8hlXXXXXX_XpXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i2/112258296/TB2XjFylXXXXXaZXXXXXXXXXXXX_!!112258296.jpg" alt="" />
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
						<a href="https://img.alicdn.com/imgextra/i2/112258296/TB24YlclXXXXXbmXpXXXXXXXXXX_!!112258296.jpg" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
							<img src="https://img.alicdn.com/imgextra/i4/112258296/TB2RsdclXXXXXbpXpXXXXXXXXXX_!!112258296.jpg" alt="" />
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