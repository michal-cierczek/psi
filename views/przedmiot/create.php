<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Przedmiot */

$this->title = 'Create Przedmiot';
$this->params['breadcrumbs'][] = ['label' => 'Przedmiots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="przedmiot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
