<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */

$this->title = 'Update Przedmiot: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Przedmiots', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'kierunekStudiow_id' => $model->kierunekStudiow_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="przedmiot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('kroki/' . $step, [
        'model' => $model,
    ]) ?>

</div>
