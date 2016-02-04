<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="przedmiot-form">

	<?=	$this -> render('/celKP/index', ['dataProvider' => $model, 'model' => $forModal]) ?>
   <div class="form-group">
        <?= Html::button('Dalej', ['class' => 'btn btn-primary']) ?>
    </div>


</div>
