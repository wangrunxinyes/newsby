<?php

namespace frontend\modules\wechat\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionAuth()
    {
    	return $this->render('auth');
    }
}
