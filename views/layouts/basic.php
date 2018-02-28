<?php
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapp">
    <div class="container">

        <nav class="nav">
            <?= Html::a('Главная', ['/my/index'])?>
            <?php
            if(Yii::$app->user->isGuest){ ?>
                <?= Html::a('Регистрация', ['/my/signup'])?>
                <?= Html::a('Войти', ['/my/login'])?>
            <?php }else{ ?>
                <?= Html::a('Выйти (' . Yii::$app->user->identity->email . ')', ['/my/logout'])?>
                <?php if(!Yii::$app->user->identity->status){ ?>
                    <span style="color: red;">Подтвердите свой емейл</span>
                <?php }else{?>
                    <span style="color: green;">Вы подтвердили емейл</span>
                <?php } ?>
            <?php } ?>
        </nav>

        <?= $content; ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>