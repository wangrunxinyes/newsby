<?php

namespace app\modules\project\utils;

use yii\helpers\Url;

class ProjectHtmlGenerate {
	public static function createIndexHtml($count, $item, $total, $assets) {
		$html = '';
		$rowend = false;
		if ($count == 1) {
			$html .= '<ul class="thumbnails gridex">';
		}
		
		
		if ($item->specialurl != null && $item->specialurl != "") {
			$url = $item->specialurl;
		} 
			
		$basicurl = Url::to ( "@web/project/default/details?trace=" . urlencode ( base64_encode ( $item->id ) ) );

		$typehtml = "";
		if ($item->type != null && $item->type != "") {
			$types = explode ( ',', $item->type );
			foreach ( $types as $value ) {
				if ($value == "IOS") {
					$typehtml .= '<img class="wrx-type-icon" title="IOS App" src="' . $assets->baseUrl . '/img/ios.png">';
				}
				
				if ($value == "ANDROID") {
					$typehtml .= '<img class="wrx-type-icon" title="Android App" src="' . $assets->baseUrl . '/img/android.png">';
				}
				
				if ($value == "WEBSITE") {
					$typehtml .= '<img class="wrx-type-icon" title="Website Project"  src="' . $assets->baseUrl . '/img/web.png">';
				}
				
				if ($value == "AWARD") {
					$typehtml .= '<img class="wrx-type-icon" title="Award Project"  src="' . $assets->baseUrl . '/img/award.png">';
				}
				
			}
		}
		
		$html .= '<li class="span3"><a href="#" class="thumbnail"> <img
				alt="Cover Image" class="wrx-project-cover-img" src="' . $item->coverimg . '" />
		</a> <!-- gd-expander required -->
			<div class="gd-expander">
				<!-- gd-inner optional -->
				<div class="gd-inner">
					<div class="row-fluid">
						<div class="span6 text-center">
							<img alt="270x170" class="img-polaroid"
								src="' . $item->bigimg . '" />
						</div>
						<div class="span6">
							<h2>' . $item->name . '</h2>
							<p>' . $item->description . '</p>
									<p>Author: ' . $item->author . '</p>
											<p>Start Time: ' . date("Y-m-d", $item->starttime) . '</p>' . $typehtml . '
							<br><br><br><br><p>';
		
		if(isset($url)){
			$html .= '<a style="margin-right:40px;" href="' . $url . '" class="btn btn-success">Visit Project</a>';
		}
			
			$html .='<a href="' . $basicurl . '" class="btn btn-success">Project Code</a></p>
						</div>
					</div>
				</div>
			</div></li>';
		if ($count % 4 == 0 && $count != 1) {
			$rowend = true;
			if ($count != $total) {
				$html .= '</ul><ul class="thumbnails gridex">';
			} else {
				$html .= '</ul>';
			}
		}
		
		if ($total == $count && ! $rowend) {
			$html .= '</ul>';
		}
		
		return $html;
	}
}
?>