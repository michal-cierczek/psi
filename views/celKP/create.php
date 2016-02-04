<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CelKP */

$this->title = 'Create Cel Kp';
$this->params['breadcrumbs'][] = ['label' => 'Cel Kps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cel-kp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
