<?php 

//register assets;
use app\modules\tour\assets\ChecklistAsset;
$assets = ChecklistAsset::register($this);

$this->title = "Check List";

if(isset($_GET['trace'])){
	$id = base64_decode($_GET['trace']);
}

use common\units\packages;

$package = new packages();
use common\utils\DataProivder;

$data = new DataProivder();
$data->identify = $package->identify;
$sql = "select * from ". $package->identify ." where tour_id = 2";
$rdb = $data->query($sql);
$package->convertToItem($rdb[1]);
$data = unserialize($package->current['data']);
use app\modules\tour\utils\TourHtmlGenerate;
echo TourHtmlGenerate::createCheckListHtml($data);

?>