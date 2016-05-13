<?php
$testArray = array (
		'common\models\RedBean',
		'common\models\Log',
		'common\units\project',
		'common\models\Message',
		'common\models\Visitor',
		'common\models\VisitorLog'
);

$resultArray = array ();

foreach ( $testArray as $item ) {
	$tester = new $item ();
	$msg = $tester->test ();
	print_r ( "<strong>test Model: " . $item . "</strong><BR>" );
	if ($tester->testResult) {
		print_r ( "<label style='color:green;font-weight: normal;'>result: success.<BR>" );
	} else {
		print_r ( "<label style='color:red;font-weight: normal;'>result: failed.<BR>" );
	}
	print_r ( "msg: " . $msg . ".</label><BR><BR>" );
}
?>