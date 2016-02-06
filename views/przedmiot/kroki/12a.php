<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

 <?= '<b>Cykl: </b>'. $cykl ?>
    
    <?= '<br><b>Nazwa kierunku: </b>'. $kierunek ?>
    
    <?= '<br><b>Nazwa Specjalności: </b>'. $specjalnosc ?>

<div class="przedmiot-form">

    <?php $form = ActiveForm::begin(); ?>
    
   <br><br>

    <?= $form->field($model, 'kodKursu')->textInput() ?>

    <?= $form->field($model, 'nazwaPolska')->textInput() ?>

    <?= $form->field($model, 'nazwaAngielska')->textInput() ?>
    
    <?= $form->field($model, 'grupaKursow')->checkbox() ?>
    
    <?= $form->field($model, 'kierunekStudiow_id')->hiddenInput(['value' => $kierunekId])->label(false) ?>
    
    <?= $form->field($model, 'published')->hiddenInput(['value' => 0])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
