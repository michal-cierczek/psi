<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Przedmiot;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

 <?= '<b>Cykl: </b>'. $kierunek->cykl ?>
    
    <?= '<br><b>Nazwa kierunku: </b>'. $kierunek->opis ?>
    
    <?= '<br><b>Nazwa Specjalności: </b>'. $kierunek->specjalnosc ?>

<div class="przedmiot-form">

    <?php $form = ActiveForm::begin(); ?>
    
   <br><br>

    <?= $form->field($model, 'kodKursu')->textInput() ?>

    <?= $form->field($model, 'nazwaPolska')->textInput() ?>

    <?= $form->field($model, 'nazwaAngielska')->textInput() ?>
    
    <?= $form->field($model, 'user_id')->dropDownList(User::usersForSelect())?>
    
    <?= $form->field($model, 'grupaKursow')->checkbox() ?>
    
    
    <?= $form->field($model, 'kierunekStudiow_id')->hiddenInput(['value' => $kierunek->id])->label(false) ?>
    
    <?= $form->field($model, 'published')->hiddenInput(['value' => 0])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
