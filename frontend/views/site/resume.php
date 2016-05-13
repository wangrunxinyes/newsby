<?php
use frontend\assets\ResumeAsset;
use yii\helpers\Url;

$asset = ResumeAsset::register ( $this );

?>
<div class="main">
	<div id="cbp-contentslider" class="cbp-contentslider">
		<ul>
			<li id="slide1">
				<h3 class="icon-wolf">Basic</h3>
				<div>
					<div class="cbp-content wrx_content_class">
						<p>
							<img
								src="https://img.alicdn.com/imgextra/i2/112258296/TB2Vpw.lVXXXXbZXpXXXXXXXXXX_!!112258296.jpg"
								style="width: 120; height: 200">
						</p>
						<p>
							SHI Bingyan <br> Birthday: 1990/11/13 <br> Email:
							shibingyan@shibingyan.com <br> Phone: (852)68163965 <br>
							<br>
							<br> <a style="color: gray; display: none"
								href="<?php //echo Yii::app()->assets->getScirptPath('documents/cv.pdf');?>">click
								to download my resume.</a> <br>
					
					</div>
				</div>
			</li>
			<li id="slide2">
				<h3 class="icon-rabbit">HighLight</h3>
				<div>
					<div class="cbp-content">
						<p>Excellent language talent and computer
							operation.</p>
						<p>
							<label>Skilled language</label> <br> Excellent listen, speak and
							write in Mandarin and English. Cantonese in Learning. <br> <label>Interest job</label>
							<br> HR and instruments.
							<br> <label>Advantages</label> <br>As a student of software engineering major, I'm familiar with software development and computer.<br>
						</p>
					</div>
				</div>
			</li>
			<li id="slide3">
				<h3 class="icon-aligator">Education</h3>
				<div>
					<div class="cbp-content">
						<p>
							<label>The Hong Kong Institute of Education</label> <br>
							01/09/2015 - 01/06/2016(*Forecast) <br> Public Policy and
							Governance <br>Master(*Forecast)
						</p> <br><br> <br><br> <br><br><br>
						<p>
							<label>Fujian Normal University</label> <br> 01/09/2009
							-01/06/2013 <br> Software Engineering <br>Bachelor
						</p> 
						<p>
							<label>Fujian Normal University</label> <br> 01/09/2009
							-01/06/2013 <br> English <br>Bachelor(Double major)
						</p>
					</div>
				</div>
			</li>
			<li id="slide4">
				<h3 class="icon-turtle">Experience</h3>
				<div>
					<div class="cbp-content">
						<p>
							<label>Teacher</label> <br> 2013/12/10 - 2015/6/10
							<br> Nanyang XX School. <br> Teaching English for junior high school student<br>regular
							employee
						</p>
						<br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
					</div>
				</div>
			</li>
			<li id="slide5">
				<h3 class="icon-platypus">Award</h3>
				<div>
					<div class="cbp-content">
						<p>
							<label>Scholarship</label> <br> Date: 2013/12 Type: Examination
							<br> Award Class: Third-class award. <br>
							Awarding Institution: Fujian Normal University. <br><br><br>
						</p>
						<p>
							<label>Outstanding teacher award</label> <br> Date: 2013/12 Type: achievement <br>
							Awarding Institution: Nanyang XX School. <br> <br> <br>
						</p>
					</div>
				</div>
			</li>
		</ul>
		<nav>
			<a href="#slide1" class="icon-wolf"> <span>Basic</span>
			</a> <a href="#slide2" class="icon-rabbit"> <span>High Light</span>
			</a> <a href="#slide3" class="icon-aligator"> <span>Education</span>
			</a> <a href="#slide4" class="icon-turtle"> <span>Experience</span>
			</a> <a href="#slide5" class="icon-platypus"> <span>Award</span>
			</a>
		</nav>
	</div>
</div>
<script>
			$(function() {
				/*
				- how to call the plugin:
				$( selector ).cbpContentSlider( [options] );
				- options:
				{
					// default transition speed (ms)
					speed : 500,
					// default transition easing
					easing : 'ease-in-out',
					// current item's index
					current : 0
				}
				- destroy:
				$( selector ).cbpContentSlider( 'destroy' );
				*/

				$( '#cbp-contentslider' ).cbpContentSlider();
			});
		</script>