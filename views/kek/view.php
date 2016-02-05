<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\DataColumn;
use app\models\Kek;

/* @var $this yii\web\View */
/* @var $model app\models\Kek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kek-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'Cykl_id' => $model->Cykl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'Cykl_id' => $model->Cykl_id], [
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
            'id',
            'symbol',
            'opis',
            'Cykl_id',
        	[
        			'class' => DataColumn::className(),
        			'attribute' => 'kategoria',
        			'value' => function($model){
        			return Kek::categoryName[$model->kategoria];
        		}
        	],
        ],
    ]) ?>

</div>
