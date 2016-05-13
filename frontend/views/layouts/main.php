<?php $this->beginPage();?>
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
<body class="error">
		<?php $this->
	beginBody();?>
		<?php echo $content; ?>
		<?php $this->endBody();?>
</body>
</html>
<?php $this->endPage();?>