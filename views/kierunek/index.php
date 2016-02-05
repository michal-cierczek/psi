<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KierunekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kierunki';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kierunek-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


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

            ['class' => 'yii\grid\ActionColumn',
            	'controller' => 'kierunek',
            	'template' => '{update} {view}',
            	'buttons'=>
            	[
            			'update' => function($url, $model, $key)
            			{
            				$icon = '<span class="glyphicon glyphicon-pencil"></span>';
            				$label = 'Edytuj';
            				$url = Url::to(["update", 'id' =>$model -> id]);
            				return Html::a($icon, $url, ['title' => $label]);
            			},
            			
            			'view' => function($url, $model, $key)
            			{
            				$icon = '<span class="glyphicon glyphicon-eye-open"></span>';
            				$label = 'Widok';
            				$url = Url::to(["view", 'id' =>$model -> id]);
            				return Html::a($icon, $url, ['title' => $label]);
            			}
            	]
    		],
        ],
    ]); ?>

</div>
