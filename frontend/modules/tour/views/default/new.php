<?php 

//register assets;
use app\modules\tour\assets\ChecklistAsset;
$assets = ChecklistAsset::register($this);

$assets->addScript($this, $assets->baseUrl. '/js/ajax.submit.js', ChecklistAsset::className());
$this->title = "Check List";

use app\modules\tour\utils\TourHtmlGenerate;
use yii\helpers\Url;

echo '<div id="ajax_submit_url" data="'.Url::to("newtour").'"></div>';

?>

<h1 style="margin-top:65px;">Create New Tour</h1>
<input data="title" class="tour-attr">
<input type= "hidden" data="module" value="createtour" class="tour-attr">
<button type="button" class="submit">submit</button>
<?php 

echo TourHtmlGenerate::createPackageChoiceHtml();
?>