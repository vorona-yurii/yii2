<?php

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller {

	public function debug($arg){
		echo '<pre>'. print_r($arg, true) . '</pre>';
	}
}