<?php

namespace frontend\modules\tour\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\tour\utils\TourDataSaver;

class DefaultController extends Controller {
	
	public function behaviors() {
		return [
				'access' => [
						'class' => AccessControl::className (),
						'rules' => [
								[
										'actions' => [
												'login',
												'error',
												'index'
										],
										'allow' => true
								],
								[
										'allow' => true,
										'roles' => [
												'@'
										]
								]
						]
				],
				'verbs' => [
						'class' => VerbFilter::className (),
						'actions' => [
								'logout' => [
										'post'
								]
						]
				]
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
				'error' => [
						'class' => 'yii\web\ErrorAction'
				]
		];
	}
	
	
	public function actionIndex() {
		$this->layout = "@app/views/layouts/layout_menu";
		return $this->render ( 'index' );
	}
	public function actionCreate() {
		$this->layout = "@app/views/layouts/layout_menu";
		return $this->render ( 'create' );
	}
	public function actionGrallery(){
		$this->layout = "@app/views/layouts/layout_menu";
		return $this->render ( 'grallery' );
	}
	public function actionPackages(){
		$this->layout = "@app/views/layouts/layout_menu";
		return $this->render ( 'checklist' );
	}
	public function actionNewtour(){
		if(isset($_GET['submit'])){
			$saver = new TourDataSaver();
			$saver->save();
			return;
		}else{
			$this->layout = "@app/views/layouts/layout_menu";
			return $this->render ( 'new' );
		}
	}
}
