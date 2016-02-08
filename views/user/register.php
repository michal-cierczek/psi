<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Rejestracja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'confirmPassword')->passwordInput() ?>
        
        <?= $form->field($model, 'name') ?>
        
        <?= $form->field($model, 'surname') ?>

		<?= $form->field($model, 'email') ?>
 
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Zarejestruj się!', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
