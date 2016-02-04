<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kurs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kurs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'formaProwadzeniaZajec')->dropDownList(['Wykład', 'Ćwieczenia', 'Laboratorium', 'Projekt', 'Seminarium']) ?>

    <?= $form->field($model, 'CMPS')->textInput() ?>

    <?= $form->field($model, 'ZZU')->textInput() ?>

    <?= $form->field($model, 'formaZaliczenia')->dropDownList(['Egzamin', 'Zaliczenie']) ?>

    <?= $form->field($model, 'bKECTS')->textInput() ?>

    <?= $form->field($model, 'pECTS')->textInput() ?>

    <?= $form->field($model, 'ECTS')->textInput() ?>

    <?= $form->field($model, 'czyKonczacy')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
