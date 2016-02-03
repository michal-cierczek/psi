<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="przedmiot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kodKursu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wymaganie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nazwaPolska')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nazwaAngielska')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kierunekStudiow_id')->textInput() ?>

    <?= $form->field($model, 'published')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
