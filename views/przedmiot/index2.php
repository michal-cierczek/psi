<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrzedmiotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Przedmioty';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="przedmiot-index2">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	
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
            'nazwaKierunku',
        	'cykl',
            // 'published',
            // 'user_id',
            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view}',
            		
    		],
        ],
    ]); ?>

</div>