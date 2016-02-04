<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ocena */

$this->title = 'Update Ocena: ' . ' ' . $model->idocenaOsiagnieciaPek;
$this->params['breadcrumbs'][] = ['label' => 'Ocenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idocenaOsiagnieciaPek, 'url' => ['view', 'id' => $model->idocenaOsiagnieciaPek]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ocena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
