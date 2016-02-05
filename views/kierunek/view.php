<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kierunek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kieruneks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kierunek-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=	$this -> render('/kek/index2', ['dataProvider' => $model, 'model' => $forModal, 'kid' => $id]) ?>

</div>
