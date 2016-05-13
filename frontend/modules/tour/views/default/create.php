<?php 

//register assets;
use frontend\assets\EditorAsset;
$assets = EditorAsset::register($this);

$this->title = "Tour";

?>

	<div class="htmleaf-container" style="margin-top: 50px;">
		<header class="htmleaf-header">
			<h1>Create New Tour Plan</h1>
		</header>
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 nopadding">
					    	<textarea id="txtEditor"></textarea> 
					    </div>
					</div>  
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready( function() {
            
         $("#txtEditor").Editor();                    
         
    	});
  	</script>
