<?php

use yii\grid\GridView;

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
        	'kategoria',
            [
            	'class' => 'yii\grid\ActionColumn',
            	'controller' => 'kek',
            	'template' => '',
    		],
        		
        ],
    ]); ?>
</div>

