<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="przedmiot-form">

	<?=	$this -> render('/narzedziaDydaktyczne/index', ['dataProvider' => $model, 'model' => $forModal, 'kid' => $id]) ?>
   <div class="pull-right">
        <?= Html::a('Dalej', ['/przedmiot/update', 'id' => $id, 'step' => 8], ['class' => 'btn btn-primary']) ?>
    </div>


</div>