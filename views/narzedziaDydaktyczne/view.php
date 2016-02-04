<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NarzedziaDydaktyczne */

$this->title = $model->idnarzedziaDydaktyczne;
$this->params['breadcrumbs'][] = ['label' => 'Narzedzia Dydaktycznes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="narzedzia-dydaktyczne-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idnarzedziaDydaktyczne], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idnarzedziaDydaktyczne], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idnarzedziaDydaktyczne',
            'symbol',
            'opis:ntext',
            'przedmiot_id',
        ],
    ]) ?>

</div>
