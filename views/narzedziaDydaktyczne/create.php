<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NarzedziaDydaktyczne */

$this->title = 'Create Narzedzia Dydaktyczne';
$this->params['breadcrumbs'][] = ['label' => 'Narzedzia Dydaktycznes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="narzedzia-dydaktyczne-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
