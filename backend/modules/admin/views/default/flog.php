<?php
use yii\helpers\Url;
?>

<BR>
<BR>
<a class="btn btn-lg btn-success"
	href="<?php echo Url::to(['default/flog']); ?>">Refresh log</a>

<a class="btn btn-lg btn-success"
	href="<?php echo Url::to(['default/flog?delete=true']); ?>">Empty log</a>
<BR>
<BR>

<?php

$logfile = __DIR__ . "/../../../../../frontend/runtime/logs/custom.log";
if (file_exists ( $logfile )) {
	if (isset ( $_GET ['delete'] )) {
		unlink ( $logfile );
		echo "Log file has been deleted.";
	} else {
		$log = file_get_contents ( $logfile );
		$data = explode ( '[-][-][info]', $log );
		$count = 0;
		foreach ( $data as $item ) {
			str_replace ( '\n', "<BR>", $item );
			echo "<BR><BR>--------------------------------------------------->" . $item;
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