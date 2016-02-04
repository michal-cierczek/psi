<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CelKP */

$this->title = 'Update Cel Kp: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cel Kps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cel-kp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
