<?php
use frontend\assets\AboutAsset;
use yii\helpers\Url;

$asset = AboutAsset::register ( $this );

?>
<div style="margin-left: 50px; margin-right: 50px; margin-top: 65px;">
	<div class="alert alert-success">
		<h3>石冰艳的个人网站  | Helen Shi</h3>
		<strong>版本 | Version</strong> <small style="margin-left: 10px;">Build
			2016.3.30</small> <br> <strong>版权 | Copyright</strong> <small
			style="margin-left: 10px;">© shibingyan.com, Inc.</small>
	</div>
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption">模块 | Modules</div>
		</div>
		<div class="portlet-body">
			<div class="row thumbnails">
				<div class="col-md-3">
					<div class="meet-our-team">
						<p>
							<a href="<?php echo Url::to("@web/tour"); ?>">旅游 | Tour</a> <br>
							<br> <br> <a
								href="<?php echo Url::to("@web/blog"); ?>">博客 | Blog </a><br> <br>
					
					</div>
				</div>
				<div class="col-md-3">
					<div class="meet-our-team">
						<p>
							<a href="<?php echo Url::to("@web/backend.php"); ?>">后台 | Backend</a>
							<br> <br> 访客记录 | Vistor record <br> <br> 信息 | Message
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Meer Our Team -->
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">开发团队 | Develop Team</div>
		</div>
		<div class="portlet-body">
			<div class="row thumbnails">
				<div class="col-md-3">
					<div class="meet-our-team">
						<h3>
							王润心 <br> <label style="font-size: 80%;">WANG Runxin</label> <br>
							<small>Software Engineer / Developer</small>
						</h3>
						<div class="team-info">
							<a href="http://www.wangrunxin.com">个人网站</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="meet-our-team">
						<h3>
							石冰艳 <br> <label style="font-size: 80%;">SHI Bingyan</label> <br>
							<small>Developer, UI Designer, Tester</small>
						</h3>
						<div class="team-info">
							<p>
								
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="meet-our-team" style="text-aligin: center">
						<img style="width: 130px; height: auto;"
							src="http://img04.taobaocdn.com/imgextra/i4/112258296/TB2SO4DcVXXXXXrXpXXXXXXXXXX_!!112258296.png"
							alt="" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="portlet box red">
		<div class="portlet-title">
			<div class="caption">团队联系方式 | Team Contacts</div>
		</div>
		<div class="portlet-body">
			<div class="row thumbnails">
				<div class="col-md-3">
					<strong>通信地址 | Address</strong>
					<address>
						WANGRUNXIN.COM, Inc. <br> ROOM 3, 15/F, Block B, <br> Beautif
						Garden, No.11, Chui Lok Street, <br> NT, HONG KONG <br>
					</address>
				</div>
				<div class="col-md-3">
					<address>
						<strong>联系电话 | TEL</strong> <br> <label style="font-size: 80%;">香港|HONG
							KONG</label> <br> (852) 9565-8786 <br> <label
							style="font-size: 80%;">中国内地|CHINA MAINLAND</label> <br>(86)
						18676460796
					</address>
				</div>
				<div class="col-md-3">
					<address>
						<strong>电子邮件 | Email</strong> <br> <a
							href="mailto:wangrunxin@wangrunxin.com">wangrunxin@wangrunxin.com</a>
					</address>
				</div>
				<div class="col-md-3" style="display: none;">
					<div class="meet-our-team">
						<img style="width: 130px; height: auto;"
							src="http://img04.taobaocdn.com/imgextra/i4/112258296/TB2SO4DcVXXXXXrXpXXXXXXXXXX_!!112258296.png"
							alt="" class="img-responsive"> <strong>WANGRUNXIN.COM, Inc.</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>