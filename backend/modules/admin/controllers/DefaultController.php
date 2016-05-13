<?php

namespace backend\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller {

	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					// allow authenticated users
					[
						'allow' => true,
						'roles' => ['@'],
					],
					// everything else is denied
				],
			],
		];
	}

	public function actionIndex() {
		return $this->render('index');
	}
	
	public function actionMessage(){
		return $this->render('message');
	}
	
	public function actionVisitor(){
		return $this->render('visitor');
	}
	
	public function actionVip(){
		return $this->render('vipvisitor');
	}
	
	public function actionIp(){
		return $this->render('ip');
	}
	
	public function actionTest(){
		return $this->render('test');
	}
	
	public function actionDeleteMsg($msg){
	}
	
	public function actionFlog(){
		return $this->render('flog');
	}
	
	public function actionBlog(){
		return $this->render('blog');
	}
	
	public function actionRefreshasset(){
		return $this->render('refreshasset');
	}
}
