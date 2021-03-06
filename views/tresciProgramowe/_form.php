<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TresciProgramowe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tresci-programowe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'liczbaGodzin')->textInput() ?>

    <?= $form->field($model, 'formaZajec')->dropDownList(['Ćwiczenia', 'Laboratorium', 'Wykład', 'Seminarium', 'Projekt']) ?>

    <?= $form->field($model, 'przedmiot_id')->hiddenInput(['value' => $_GET['id']])->label(false) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
