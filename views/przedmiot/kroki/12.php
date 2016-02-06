<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
?>
<h3>Wybierz kierunek dla którego chcesz dodać przedmiot z poniższej listy.</h3>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	[
        		'attribute' => 'opis',
        		'label' => 'Nazwa'
        	],
            'stopien',
            'skrot',
        	'specjalnosc',
        	'cykl',
            ['class' => 'yii\grid\ActionColumn',
            	'controller' => 'kierunek',
            	'template' => '{ok}',
            	'buttons'=>
            	[
            			'ok' => function($url, $model, $key)
            			{
            				$icon = '<span class="glyphicon glyphicon-ok"></span>';
            				$label = 'Wybierz';
            				$url = Url::to(["create", 'step'=>'12a', 'kierunekId' => $model->id, 'kierunek'=>$model->opis, 'specjalnosc'=>$model->specjalnosc, 'cykl'=>$model->cykl]);
            				return Html::a($icon, $url, ['title' => $label]);
            				
            				
            			}
            			
            			
            	]
    		],
        ],
    ]); 
            	?>