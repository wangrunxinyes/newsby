<?php
use yii\helpers\Url;
?>

<BR><BR>
<a class="btn btn-lg btn-success" href="<?php echo Url::to(['default/refreshasset']); ?>">Refresh assets</a>
<BR><BR>

<?php
function tree($directory) {
	$mydir = dir ( $directory );
	echo "<ul>\n";
	while ( $file = $mydir->read () ) {
		if ((is_dir ( "$directory/$file" )) and ($file != ".") and ($file != "..")) {
			rrmdir ( $directory . '/' . $file );
			echo "<li><font color=\"black\"><b>Delete: " . $file . "</b></font></li>\n";
		}
	}
	echo "</ul>\n";
	$mydir->close ();
}
function rrmdir($dir) {
	if (is_dir ( $dir )) {
		$objects = scandir ( $dir );
		foreach ( $objects as $object ) {
			if ($object != "." && $object != "..") {
				if (filetype ( $dir . "/" . $object ) == "dir") {
					rrmdir ( $dir . "/" . $object );
				} else {
					unlink ( $dir . "/" . $object );
				}
			}
		}
		reset ( $objects );
		rmdir ( $dir );
	}
}

tree ( __DIR__ . '/../../../../../frontend/web/assets' );

?>