<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TresciProgramowe */

$this->title = 'Create Tresci Programowe';
$this->params['breadcrumbs'][] = ['label' => 'Tresci Programowes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tresci-programowe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
