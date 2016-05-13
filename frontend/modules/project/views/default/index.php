<?php 

use app\modules\project\assets\ProjectAsset;
use yii\helpers\Url;
use app\modules\project\utils\ProjectDataProivder;
use common\units\project;
use app\modules\project\utils\ProjectHtmlGenerate;

$asset = ProjectAsset::register($this);
$dataProvider = new ProjectDataProivder();
$items = $dataProvider->loadProjctsByType(project::$PROJECT_INPROGRESS);

?>
<div class="container wrapper" style="margin-top: 50px;">
	<br />
	<h2>Current Projects<a href="<?php echo Url::to("@web/project/default/create");?>" class="btn btn-success" style="float:right;">Create New</a></h2>
	<hr>
	<div class="clearfix"></div>
	<?php 
	
	   $count = 1;
	   $total = count($items);
	   foreach ($items as $item){
	   	  echo ProjectHtmlGenerate::createIndexHtml($count, $item, $total, $asset);
	   	  $count++;
	   }
	?>
	
	<br />
	<h2>Completed Projects</h2>
	<hr>
	<div class="clearfix"></div>
		<?php 
		$items = $dataProvider->loadProjctsByType(project::$PROJECT_FINISH);
		
		$count = 1;
		$total = count($items);
		foreach ($items as $item){
			echo ProjectHtmlGenerate::createIndexHtml($count, $item, $total, $asset);
			$count++;
		}
		?>
</div>


<script>
		$(function() {
			$('.gridex').gridex();
		})
    </script>