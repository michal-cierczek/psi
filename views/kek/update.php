<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kek */

$this->title = 'Update Kek: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Cykl_id' => $model->Cykl_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kek-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
