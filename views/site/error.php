<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
   		Błąd w trakcie przetwarzania zapytania przez serwer.
    </p>
    <p>
        Jeśli uważasz że problem leży po stronie serwera skontaktuj się z nami. Dziękujemy!
    </p>

</div>
