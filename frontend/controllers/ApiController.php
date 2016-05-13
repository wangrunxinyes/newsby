<?php
namespace frontend\controllers;
use frontend\utils\ApiHelper;
use yii\web\Controller;

class ApiController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionCall() {

		$apiHelper = new ApiHelper();

		if (isset($_REQUEST['json'])) {
			$apiHelper->analysisCall($_REQUEST['json']);
		} else {
			$apiHelper->createErrorJson(-1, 'no json data found.');
		}
	}
}

?>