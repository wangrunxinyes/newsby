<?php

namespace app\modules\tour\utils;

use common\units\packages;
use yii\helpers\Url;

class TourHtmlGenerate {
	public static function createPackageChoiceHtml() {
		$html = '';
		$html .= '<section id="cd-table" style="margin-top:65px;">';
		foreach ( packages::getAllCategories () as $key => $val ) {
			$section = array ();
			
			$html .= '<section id="cd-table" style="margin-top:65px;">';
			$html .= '<header class="cd-table-column"><h2>' . packages::getNames ( $key ) . '</h2><ul>';
			
			$required = "";
			$amount = '';
			foreach ( $val as $ikey ) {
				$html .= '<li>' . packages::getNames ( $ikey ) . '</li>';
				$required .= '<li><input id="check_' . $ikey . '" type="checkbox"></li>';
				$amount .= '<li><input type="text" class="package-item" data="' . $ikey . '"></li>';
			}
			
			$html .= '</ul></header><div class="cd-table-container">
						<div class="cd-table-wrapper">
						<div class="cd-table-column">
						<h2>需求</h2>
						<ul>';
			
			$html .= $required;
			
			$html .= '</ul></div> <!-- cd-table-column -->
						<div class="cd-table-column">
						<h2>数量</h2><ul>';
			$html .= $amount;
			$html .= '</ul></div> <!-- cd-table-column -->
						</div> <!-- cd-table-wrapper -->
						</div> <!-- cd-table-container -->
						<em class="cd-scroll-right"></em>
						</section> <!-- cd-table -->';
		}
		return $html;
	}
	public static function createCheckListHtml($item) {
		$html = '';
		$html .= '<section id="cd-table" style="margin-top:65px;">';
		foreach ( packages::getAllCategories () as $key => $val ) {
			$section = array ();
			$html .= '<section id="cd-table" style="margin-top:65px;">';
			foreach ( $val as $ikey ) {
				if (isset ( $item [$ikey] )) {
					$section [$ikey] = $item [$ikey] ;
				}
			}
			
			$html .= '<header class="cd-table-column"><h2>' . packages::getNames ( $key ) . '</h2><ul>';
			
			$required = "";
			$amount = '';
			foreach ( $section as $key => $val ) {
				$html .= '<li>' . packages::getNames ( $key ) . '</li>';
				$required .= '<li class="cd-checked"><span>Yes</span></li>';
				$amount .= '<li>' . $val . '</li>';
			}
			
			$html .= '</ul></header><div class="cd-table-container">
						<div class="cd-table-wrapper">
						';
			
			//$html .= $required;
			
			$html .= '
						<div class="cd-table-column">
						<h2>数量</h2><ul>';
			$html .= $amount;
			$html .= '</ul></div> <!-- cd-table-column -->
						</div> <!-- cd-table-wrapper -->
						</div> <!-- cd-table-container -->
						</section> <!-- cd-table -->';
		}
		
		$html .= '<section id="cd-table" style="margin-top:65px;"><header class="cd-table-column"><h2>其他</h2><ul><li>门窗</li><li>电灯、插座</li><li>miumiu</li></ul></header><div class="cd-table-container">
						<div class="cd-table-wrapper">
						
						<div class="cd-table-column">
						<h2>检查</h2><ul><li>关好，卧室窗开小缝通风。</li><li>插座、灯断电，开排气扇。</li><li>猫粮足量，喝的水准备充足。</li></ul></div> <!-- cd-table-column -->
						</div> <!-- cd-table-wrapper -->
						</div> <!-- cd-table-container -->
						
						</section>';
		return $html;
	}
}
?>