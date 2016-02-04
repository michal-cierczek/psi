<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KursSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kurs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'formaProwadzeniaZajec') ?>

    <?= $form->field($model, 'CMPS') ?>

    <?= $form->field($model, 'ZZU') ?>

    <?= $form->field($model, 'formaZaliczenia') ?>

    <?php // echo $form->field($model, 'bKECTS') ?>

    <?php // echo $form->field($model, 'pECTS') ?>

    <?php // echo $form->field($model, 'ECTS') ?>

    <?php // echo $form->field($model, 'czyKonczacy') ?>

    <?php // echo $form->field($model, 'przedmiot_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
