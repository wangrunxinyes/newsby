<?php

namespace frontend\modules\property\controllers;

use yii\web\Controller;

class DefaultController extends Controller {
	public function actionIndex() {
		$this->layout = "frame";
		return $this->render('index');
	}
}
