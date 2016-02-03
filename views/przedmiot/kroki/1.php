<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="przedmiot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kodKursu')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'nazwaPolska')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'nazwaAngielska')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'nazwaKierunku')->textInput(['disabled' => true]) ?>
    
    <?= $form->field($model, 'nazwaSpec')->textInput(['disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
