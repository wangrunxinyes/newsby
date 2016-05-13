<?php
use yii\helpers\Url;

?>
<style>
  .btn-lg{
  margin-right: 10px;
  }
</style>
<div class="admin-default-index">
	<p>Functional Pannel</p>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['default/message']); ?>">Message Control</a>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['default/visitor']); ?>">Visitor Control</a>
	<BR>
	<BR>
	<p>Blog Pannel</p>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['../blog/blog-catalog']); ?>">Edit Category</a>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['../blog/blog-post']); ?>">Edit Post</a>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['../blog/blog-comment']); ?>">Edit Comment</a>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['../blog/blog-tag']); ?>">Edit TAG</a>
	<BR>
	<BR>
	<p>Amdin Control Pannel</p>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['default/test']); ?>">Test models</a> <a
		class="btn btn-lg btn-success"
		href="<?php echo Url::to(['default/blog']); ?>">Show Backend Log</a><a
		class="btn btn-lg btn-success"
		href="<?php echo Url::to(['default/flog']); ?>">Show Frontend Log</a>
	<a class="btn btn-lg btn-success"
		href="<?php echo Url::to(['default/refreshasset']); ?>">Refresh assets</a>
	<BR>
	<BR> <BR>

</div>
