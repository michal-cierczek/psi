<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrzedmiotSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="przedmiot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kodKursu') ?>

    <?= $form->field($model, 'wymaganie') ?>

    <?= $form->field($model, 'nazwaPolska') ?>

    <?= $form->field($model, 'nazwaAngielska') ?>

    <?php // echo $form->field($model, 'kierunekStudiow_id') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
