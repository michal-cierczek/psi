<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KierunekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kieruneks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kierunek-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kierunek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'opis',
            'cykl_id',
            'stopien',
            'skrot',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
