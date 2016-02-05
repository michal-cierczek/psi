<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Przedmiotowe Efekty Kształcenia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pek-index">

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  		Dodaj PEK
	</button>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	'symbol',
            'opis:ntext',
        	'kategoria',
            [
            	'class' => 'yii\grid\ActionColumn',
            	'controller' => 'pek',
            	'template' => '{del}',
                'buttons' => 
            		[
						'del' => function($url, $model, $key){
        						$icon = '<span class="glyphicon glyphicon-trash"></span>';
        						$label = 'Usun';
        						$url = Url::to(["/pek/delete", 'id' =>$model -> id, 'kid' => $model->przedmiot_id]);
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
        <h4 class="modal-title" id="myModalLabel">Dodaj pek</h4>
      </div>
      <div class="modal-body">
      <?= $this->render('/pek/_form', ['model' => $model])?>
      </div>
    </div>
  </div>
</div>
