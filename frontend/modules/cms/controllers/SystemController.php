<?php

class SystemController extends Controller {

	public $layout = 'empty';

	public function actions() {

		return array(

			// captcha action renders the CAPTCHA image displayed on the contact page

			'captcha' => array(

				'class' => 'CCaptchaAction',

				'backColor' => 0xFFFFFF,

			),

			// page action renders "static" pages stored under 'protected/views/site/pages'

			// They can be accessed via: index.php?r=site/page&view=FileName

			'page' => array(

				'class' => 'CViewAction',

			),

		);

	}

	public function actionInit() {
		$this->layout = "clean";

		$this->render('init');
	}

	public function actionOauth() {
		$this->render('oauth');
	}

	public function actionError() {

		if ($error = Yii::app()->errorHandler->error) {

			if (Yii::app()->request->isAjaxRequest) {

				echo $error['message'];

			} else {

				$this->RenderPartial('error', $error);

			}

		}

	}

	public function actionIndex() {

		$this->layout = "clean";

		$this->render('index');

	}

	public function actionTest() {

		$this->render('test');

	}

	public function actionPhoto() {

		$this->RenderPartial("photo");

	}

	public function actionUser() {

		$this->RenderPartial('user');

	}

	public function actionLogin() {

		if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {

			throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

		}

		$model = new LoginForm;

		// if it is ajax validation request

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {

			echo CActiveForm::validate($model);

			Yii::app()->end();

		}

		// collect user input data

		if (isset($_POST['LoginForm'])) {

			$model->attributes = $_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid

			if ($model->validate() && $model->login()) {

				$this->redirect(Yii::app()->user->returnUrl);

			}

		}

		// display the login form

		$this->render('login', array('model' => $model));

	}

	public function actionLogout() {

		Yii::app()->user->logout();

		$this->redirect(Yii::app()->homeUrl);

	}

	public function actionPhonemenu() {
		$this->render('phone_menu_test');
	}

	public function actionAdmin() {

		$this->layout = "empty";

		$this->render("admin");

	}

}
