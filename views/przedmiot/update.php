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
				['label' => 'Kursy', 'url' => Url::to(['update', 'id' => $id, 'step'=>'2'])],
				['label' => 'Wymagania', 'url' => Url::to(['update', 'id' => $id, 'step'=>'3'])],
				['label' => 'Cele przedmiotu', 'url' => Url::to(['update', 'id' => $id, 'step'=>'4'])],
				['label' => 'PEK', 'url' => Url::to(['update', 'id' => $id, 'step'=>'5'])],
				['label' => 'Treści programowe', 'url' => Url::to(['update', 'id' => $id, 'step'=>'6'])],
				['label' => 'Narzędzia dydaktyczne', 'url' => Url::to(['update', 'id' => $id, 'step'=>'7'])],
				['label' => 'Ocena osiągnięcia PEK', 'url' => Url::to(['update', 'id' => $id, 'step'=>'8'])],
				['label' => 'Literatura', 'url' => Url::to(['update', 'id' => $id, 'step'=>'9'])],
				['label' => 'Opiekun', 'url' => Url::to(['update', 'id' => $id, 'step'=>'10'])],
// 				['label' => 'Macierz powiązania', 'url' => Url::to(['update', 'id' => $id, 'step'=>'11'])],
				['label' => 'Powiązane KEK', 'url' => Url::to(['create', 'step'=>'14', 'pid' => $id])],
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
