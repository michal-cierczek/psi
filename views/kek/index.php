<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\DataColumn;
use app\models\Kek;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kierunkowe efekty kształcenia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kek-index">
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  		Dodaj kierunkowy efekt kształcenia
	</button>

    <?= GridView::widget([
    	'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	'symbol',
        	'kierunekStudiow_id', 
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
            	'template' => '{del}',
                'buttons' => 
            		[
						'del' => function($url, $model, $key){
        						$icon = '<span class="glyphicon glyphicon-trash"></span>';
        						$label = 'Usun';
        						$url = Url::to(["/kek/delete", 'id' =>$model->id, 'kid' => $model->kierunekStudiow_id]);
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
        <h4 class="modal-title" id="myModalLabel">Dodaj kierunkowy efekt kształcenia</h4>
      </div>
      <div class="modal-body">
      <?= $this->render('/kek/_form', ['model' => $model])?>
      </div>
    </div>
  </div>
</div>
