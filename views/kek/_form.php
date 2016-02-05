<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'kategoria')->dropDownList(['Wiedza', 'Umiejętności', 'Kompetencje Społeczne']) ?>

    <?= $form->field($model, 'kierunekStudiow_id')->hiddenInput(['value' => $_GET['id']])->label(false) ?>
    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
