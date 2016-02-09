<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\DataColumn;
use app\models\Kek;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kierunkowe efekty kształcenia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kek-index">
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  		Powiąż KEK
	</button>

    <?= GridView::widget([
    	
        'dataProvider' => $dataProvider,
    	'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	'symbol',
        	//'kierunekStudiow_id', 
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
								return Yii::$app->user->identity->groupId=='admin'? Html::a($icon, $url, ['title' => $label]):'';
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
        <h4 class="modal-title" id="myModalLabel">Powiąż przedmiot z kierunkowymi efektami kształcenia</h4>
      </div>
      <div class="modal-body">
      <?php 
      $form = ActiveForm::begin();
      echo '<label class="control-label">Wybierz:</label>';
      echo Select2::widget([
      		'name' => 'KeksOdBabci',
      		'data' => Kek::keksForSelect2($przedmiot->kierunekStudiow_id, $przedmiot->id) ,
      		'options' => ['placeholder' => 'Wybierz KEKi', 'multiple' => true],
      		'pluginOptions' => [
      				'tags' => true,
      				'maximumInputLength' => 10
      		],
      ]);
      ?>
      <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>
