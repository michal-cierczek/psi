<?php

use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */

$this->title = 'Edycja karty przedmiotu. Krok: ' . ' ' . $step;
$this->params['breadcrumbs'][] = ['label' => 'Przedmiots', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'kierunekStudiow_id' => $model->kierunekStudiow_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-sm-3">
<?= SideNav::widget([
		'type' => SideNav::TYPE_DEFAULT,
		'encodeLabels' => false,
		'heading' => false,
		'items' => [
				['label' => 'Informacje podstawowe', 'url' => Url::to(['update', 'id' => $id, 'step'=>'1'])],
				
				['label' => 'Opiekun', 'url' => Url::to(['update', 'id' => $id, 'step'=>'10'])],
				
		],
]); ?>
</div>
<div class="col-sm-9">
<div class="przedmiot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('kroki/' . $step, [
        'model' => $model,
    	'forModal' => $forModal,
    	'id' => $id
    ]) ?>
</div>
</div>
