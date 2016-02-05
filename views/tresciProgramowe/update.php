<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TresciProgramowe */

$this->title = 'Update Tresci Programowe: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tresci Programowes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tresci-programowe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
