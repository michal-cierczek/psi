<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TresciProgramoweSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tresci-programowe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'symbol') ?>

    <?= $form->field($model, 'opis') ?>

    <?= $form->field($model, 'liczbaGodzin') ?>

    <?= $form->field($model, 'formaZajec') ?>

    <?php // echo $form->field($model, 'przedmiot_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
