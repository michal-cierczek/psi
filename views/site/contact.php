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
    	<li> Michał Cierczek <a href="mailto:192578@student.pwr.edu.pl">192578@student.pwr.edu.pl</a>
    	<li> Marcin Klimiuk <a href="mailto:192550@student.pwr.edu.pl">192550@student.pwr.edu.pl</a>
    	<li> Mariusz Sikociński <a href="mailto:192573@student.pwr.edu.pl">192550@student.pwr.edu.pl</a>
    </ul>
</div>