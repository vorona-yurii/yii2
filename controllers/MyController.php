<?php


namespace app\controllers;

class MyController extends AppController
{
    //public $layout = 'basic';

	public function actionIndex(){
		return $this->render('index');
	}

    public function actionShow(){
	    $this->layout = 'basic';
        return $this->render('show');
    }
}
