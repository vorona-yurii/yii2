<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;
use yii\helpers\Html;


Class Signup extends Model
{
    public $email;
    public $password;
    public $activation;

    private $_user = false;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'max' => 10, 'min' => 2],
        ];
    }

    public function signup()
    {
        $date = time();
        $user = new User();
        $user->email = $this->email;
        $user->password = md5($this->password);
        $this->activation = md5($date.md5($this->password));
        $user->key = $this->activation;
        $user->time = $date;

        if($user->save()){
            Yii::$app->user->login($user, 3600*24*30);
        	return $user;
        }

        return false;
    }

}

?>