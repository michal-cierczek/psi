<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\DataColumn;
use app\models\Kurs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KursSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Kursy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurs-index">
   	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  		Dodaj Kurs
	</button>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
        	[ // forma prowadzenia zajęć
        		'class' => DataColumn::className(),
        		'attribute' => 'formaProwadzeniaZajec',
        		'value' => function($model){
        		return Kurs::formaProwadzeniaNames[$model->formaProwadzeniaZajec];
        		}
        	],
        	[ // forma zaliczenia
        		'class' => DataColumn::className(),
        		'attribute' => 'formaZaliczenia',
        		'value' => function($model){
        		return Kurs::formaZaliczeniaNames[$model->formaZaliczenia];
        		}
        	],
            ['attribute' => 'CMPS', 'label'=>'CNPS'],
            ['attribute' => 'ZZU', 'label'=>'ZZU'],
        	['attribute' => 'ECTS', 'label'=>'ECTS'],
            ['attribute' => 'bKECTS', 'label'=>'BK-ECTS'],
            ['attribute' => 'pECTS', 'label'=>'P-ECTS'],
            [ // czy kończący
	            'class' => DataColumn::className(),
	            'attribute' => 'czyKonczacy',
	            'value' => function($model){
	            return Kurs::czyKonczacyNames[$model->czyKonczacy];
	            }
            ],
            [
            	'class' => 'yii\grid\ActionColumn',
            	'controller' => 'kurs',
            	'template' => '{del}',
                'buttons' => 
            		[
						'del' => function($url, $model, $key){
        						$icon = '<span class="glyphicon glyphicon-trash"></span>';
        						$label = 'Usun';
        						$url = Url::to(["/kurs/delete", 'id' =>$model -> id, 'kid' => $model->przedmiot_id]);
								return Html::a($icon, $url, ['title' => $label]);
								}
    				]
            ],
        ],
    ]); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Dodaj kurs</h4>
      </div>
      <div class="modal-body">
      <?= $this->render('/kurs/_form', ['model' => $model])?>
      </div>
    </div>
  </div>
</div>

