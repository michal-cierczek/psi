<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Kontakt';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
	<br/>
	<h3>Autorzy:</h3>
    <ul>
    	<li> Michał Cierczek, 192578
    	<li> Mariusz Sikociński, 192573
    	<li> Marcin Klimiuk, 192550
    </ul>
</div>
