<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Easy KRK',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
        		['label' => 'Home', 'url' => ['/site/index']],
        		Yii::$app->user->isGuest ?
        			['label' => 'Przeglądaj kartę przedmiotu', 'url' => ['/site/index']] :
        			[
        			'label' => 'Karta przedmiotu', 
        			'url' => ['/przedmiot/index'],
        			],
        		Yii::$app->user->isGuest ?
        		['label' => 'Kierunkowe efekty kształcenia', 'url' => ['/site/index']] :
        		[
        				'label' => 'Kierunkowe efekty kształcenia',
        				'url' => ['/kek/index'],
        		],
	            ['label' => 'About', 'url' => ['/site/about']],
	            ['label' => 'Contact', 'url' => ['/site/contact']],
	            Yii::$app->user->isGuest ?
	                ['label' => 'Zaloguj', 'url' => ['/user/login']] :
	                [
	                    'label' => 'Wyloguj (' . Yii::$app->user->identity->username . ')',
	                    'url' => ['/user/logout'],
	                    'linkOptions' => ['data-method' => 'post']
	                ],
        		
        	Yii::$app->user->isGuest ?
        		['label' => 'Rejestracja', 'url' => ['/user/register']] :
        		[
        				'label' => ''
        		],
        		
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Easy KRK <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
