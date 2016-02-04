<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pek */

$this->title = 'Create Pek';
$this->params['breadcrumbs'][] = ['label' => 'Peks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
