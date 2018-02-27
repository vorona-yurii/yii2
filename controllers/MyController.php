<?php
namespace app\controllers;

use Yii;
use app\models\Signup;
use app\models\Login;
use app\models\MailKsl;
use app\models\User;

class MyController extends AppController
{
    public $layout = 'basic';

	public function actionIndex(){
		return $this->render('index');
	}

    public function actionShow(){
        return $this->render('show');
    }

    public function actionSignup()
    {
        $model = new Signup();

        if ($_POST['Signup']){

            $model->attributes = Yii::$app->request->post('Signup');

            if($model->validate() && $user = $model->signup()){

                $mailSend = new MailKsl();
                $mailSend->mail_activation($user['email'], $user['key']);
            }
            return $this->redirect(['/my/index']);
        }

        return $this->render('signup', ['model'=> $model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/my/index']);
        }

        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/my/index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/my/index']);
    }

    public function actionActivation()
    {
        if(isset($_GET['code'])){

            $code = $_GET['code'];

            $findByKey = User::findByKey($code);

            if($findByKey && !$findByKey['status']){

                $model = User::find()->where(['key' => $code])->one();

                $model->status = 1;

                if ($model->save()) {
                    return $this->render('activation');;
                }
            }else{
                return $this->redirect(['/my/index']);
            }
        }else{
            return $this->redirect(['/my/index']);
        }
    }

}
