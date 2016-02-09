<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="przedmiot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'autorName')->textInput(['disabled' => true]) ?>
    <?= $form->field($model, 'autorSurname')->textInput(['disabled' => true]) ?>
    <?= $form->field($model, 'autorEmail')->textInput(['disabled' => true]) ?>



    <div class="form-group">
        <?= Html::a('Opublikuj', ['/przedmiot/opublikuj', 'id'=>$id], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>