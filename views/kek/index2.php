<?php

use yii\grid\GridView;
use yii\grid\DataColumn;
use app\models\Kek;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kek-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	'symbol',
            'opis:ntext',
        	[
        			'class' => DataColumn::className(),
        			'attribute' => 'kategoria',
        			'value' => function($model){
        			return Kek::categoryName[$model->kategoria];
        		}
        	],
            [
            	'class' => 'yii\grid\ActionColumn',
            	'controller' => 'kek',
            	'template' => '',
    		],
        		
        ],
    ]); ?>
</div>

