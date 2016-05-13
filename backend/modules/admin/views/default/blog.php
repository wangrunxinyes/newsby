<?php
use yii\helpers\Url;
?>

<BR>
<BR>
<a class="btn btn-lg btn-success"
	href="<?php echo Url::to(['default/blog']); ?>">Refresh log</a>

<a class="btn btn-lg btn-success"
	href="<?php echo Url::to(['default/blog?delete=true']); ?>">Empty log</a>
<BR>
<BR>

<?php

$logfile = __DIR__ . "/../../../..//runtime/logs/app.log";

if (file_exists ( $logfile )) {
	if (isset ( $_GET ['delete'] )) {
		unlink ( $logfile );
		echo "Log file has been deleted.";
	} else {
		$log = file_get_contents ( $logfile );
		$data = explode ( '[error]', $log );
		$count = 0;
		foreach ( $data as $item ) {
			str_replace ( '\n', "<BR>", $item );
			echo "<BR><pre><xmp>" . $item . "</xmp></pre>";
			$count ++;
			if ($count >= 10) {
				break;
			}
		}
	}
} else {
	echo "Log file is empty.";
}

?>