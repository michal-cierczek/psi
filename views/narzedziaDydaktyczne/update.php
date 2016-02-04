<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NarzedziaDydaktyczne */

$this->title = 'Update Narzedzia Dydaktyczne: ' . ' ' . $model->idnarzedziaDydaktyczne;
$this->params['breadcrumbs'][] = ['label' => 'Narzedzia Dydaktycznes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnarzedziaDydaktyczne, 'url' => ['view', 'id' => $model->idnarzedziaDydaktyczne]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="narzedzia-dydaktyczne-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
