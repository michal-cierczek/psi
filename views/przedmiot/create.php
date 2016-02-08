<?php

use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */

$this->title = 'Tworzenie karty przedmiotu. ';
$this->params['breadcrumbs'][] = ['label' => 'Przedmiots', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'kierunekStudiow_id' => $model->kierunekStudiow_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="col-sm-3">
<?= SideNav::widget([
		'type' => SideNav::TYPE_DEFAULT,
		'encodeLabels' => false,
		'heading' => false,
		'items' => [
				['label' => 'Informacje podstawowe', 'url' => Url::to(['create', 'step'=>'13'])],
				['label' => 'Powiązane KEK', 'url' => Url::to(['create', 'step'=>'14'])],
				['label' => 'Opiekun przedmiotu', 'url' => Url::to(['create', 'step'=>'15'])],
							
		],
]); ?>
</div>
<div class="col-sm-9">
<div class="przedmiot-create">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if($step!='13a'){?>
    <?= $this->render('kroki/' . $step, [
    	'model' =>$model,
    	'searchModel'=> $searchModel, 'dataProvider' => $dataProvider,
    	'forModal' => $forModal,
    ]) ?>
<?php }else{
	echo $this->render('kroki/' . $step, [
    	'model'=> $model, 'kierunekId' => $kierunekId, 'kierunek'=>$kierunek, 'specjalnosc'=>$specjalnosc, 'cykl'=>$cykl
    ]);
}?>
</div>
</div>
