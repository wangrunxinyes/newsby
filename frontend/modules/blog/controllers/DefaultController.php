<?php

namespace frontend\modules\blog\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
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
										'actions' => [
												'logout',
												'create',
										],
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
    public function actionIndex()
    {
    	$this->layout = "@app/views/layouts/layout_menu";
        return $this->render('index');
    }
}
