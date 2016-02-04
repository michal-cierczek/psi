<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NarzedziaDydaktyczneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Narzedzia Dydaktycznes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="narzedzia-dydaktyczne-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Narzedzia Dydaktyczne', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idnarzedziaDydaktyczne',
            'symbol',
            'opis:ntext',
            'przedmiot_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
