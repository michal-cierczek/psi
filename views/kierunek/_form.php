<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kierunek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kierunek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cykl_id')->textInput() ?>

    <?= $form->field($model, 'stopien')->textInput() ?>

    <?= $form->field($model, 'skrot')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
