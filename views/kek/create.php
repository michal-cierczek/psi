<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kek */

$this->title = 'Create Kek';
$this->params['breadcrumbs'][] = ['label' => 'Keks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
