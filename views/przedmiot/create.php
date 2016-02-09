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

<div class="col-sm-12">
<div class="przedmiot-create">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
	if($step == 14){
		echo $this->render('kroki/' . $step, [
    		'model' =>$model, 'przedmiot' => $przedmiot,
    		'searchModel'=> $searchModel, 'dataProvider' => $dataProvider,
    		'forModal' => $forModal
		]);
	} elseif($step!='13a'){
		echo $this->render('kroki/' . $step, [
    		'model' =>$model,
    		'searchModel'=> $searchModel, 'dataProvider' => $dataProvider,
    		'forModal' => $forModal,
    	]); 
	}else{
		echo $this->render('kroki/' . $step, [
    	'model'=> $model, 'kierunek' => $kierunek
    	]);
	}	
?>
</div>
</div>
