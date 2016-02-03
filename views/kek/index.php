<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Kek;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kek-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'symbol',
            'opis',
            'Cykl_id',
            [
            	'label' => 'Kategoria',
            	'value' => function($model){
            		return KeK::categoryName[$model->kategoria]; 
    			}
    		],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
