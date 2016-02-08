<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\multiselect\MultiSelect;
use app\models\Ocena;

/* @var $this yii\web\View */
/* @var $model app\models\Ocena */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ocena-form">

    <?php $form = ActiveForm::begin(['id'=>'ocenaForm']); ?>

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>
    
    <?= MultiSelect::widget([
    		'data' => Ocena::peksForMultiselect($kid),
    		'name' => 'wybranePek',
    		'options' => [
    			'multiple' => 'multiple'
    		]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
