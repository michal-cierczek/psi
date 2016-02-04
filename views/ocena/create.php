<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ocena */

$this->title = 'Create Ocena';
$this->params['breadcrumbs'][] = ['label' => 'Ocenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
