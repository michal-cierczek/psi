<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrzedmiotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Przedmiots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="przedmiot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	
    <p>
        <?= Html::a('Create Przedmiot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'kodKursu',
            //'wymaganie',
            'nazwaPolska',
            'nazwaAngielska',
            // 'kierunekStudiow_id',
            // 'published',
            // 'user_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
