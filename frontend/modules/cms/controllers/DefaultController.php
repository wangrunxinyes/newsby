<?php

namespace frontend\modules\cms\controllers;

use yii;
use yii\web\Controller;

class DefaultController extends Controller {

	public function check() {

		if (Yii::$app->user->isGuest) {

			$this->redirect(array('/backend/login'));

		} elseif (!Yii::app()->weixin->checkWeixin()) {

			$this->redirect(array('/backend/account'));

		} elseif (!AccessController::check()) {

			$this->redirect(array('/backend/permission'));

		}

	}

	public function actionIndex() {
		//self::check();

		$this->layout = "admin_frame";

		$this->render('index');
	}
}
