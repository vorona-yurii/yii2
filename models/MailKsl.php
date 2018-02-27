<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

Class MailKsl extends Model {
    public function mail_activation ($email, $cod){

        $absoluteHomeUrl = Url::home(true); //http://ваш сайт
        $serverName = Yii::$app->request->serverName; //ваш сайт без http
        $url = $absoluteHomeUrl.'?r=my/activation/&code='.$cod;

        $msg = "Здравствуйте! Спасибо за оформление подписки на сайте $serverName!  Вам осталось только подтвердить свой e-mail. Для этого перейдите по ссылке $url";

        $msg_html  = "<html><body style='font-family:Arial,sans-serif;'>";
        $msg_html .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Здравствуйте! Спасибо за оформление подписки на сайте <a href='". $absoluteHomeUrl ."'>$serverName</a></h2>\r\n";
        $msg_html .= "<p><strong>Вам осталось только подтвердить свой e-mail.</strong></p>\r\n";
        $msg_html .= "<p><strong>Для этого перейдите по ссылке </strong><a href='". $url."'>$url</a></p>\r\n";
        $msg_html .= "</body></html>";

        Yii::$app->mailer->compose()
            ->setTo($email) 
            ->setFrom(Yii::$app->params['adminEmail']) 
            ->setSubject('Подтверждение подписки.') 
            ->setTextBody($msg) 
            ->setHtmlBody($msg_html)
            ->send();
    }
}