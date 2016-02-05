<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kierunek */

$this->title = 'Edycja Kierunkowych Efektów Kształcenia: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kieruneks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kierunek-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=	$this -> render('/kek/index', ['dataProvider' => $model, 'model' => $forModal, 'kid' => $id]) ?>

</div>
