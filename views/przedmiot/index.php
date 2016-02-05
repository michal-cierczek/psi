<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrzedmiotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Przedmioty';
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
            'kodKursu',
            'nazwaPolska',
            'nazwaAngielska',
        	[ // kierunek
        		'attribute' => 'kierunekStudiow_id',
        		'value' => 'kierunekStudiow.opis',
        		'label' => 'Nazwa kierunku'
        	],
        	[ // cykl
        		'attribute' => 'kierunekStudiow_id',
        		'value' => 'kierunekStudiow.cykl',
        		'label' => 'Cykl'
        	],
            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view} {update} {delete}',
            		'buttons'=>
            		[
            			'update' => function($url, $model, $key)
            			{
	        				$icon = '<span class="glyphicon glyphicon-pencil"></span>';
	        				$label = 'Edytuj';
	        				$url = Url::to(["update", 'id' =>$model -> id, 'step' => '1']);
							return Html::a($icon, $url, ['title' => $label]);
						}
    				]
    		],
        ],
    ]); ?>

</div>
