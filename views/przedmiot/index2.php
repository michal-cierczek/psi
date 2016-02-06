<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PrzedmiotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Przedmioty';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="przedmiot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	
    <p>
        <?= Html::a('Create Przedmiot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'kodKursu',
            'nazwaPolska',
            'nazwaAngielska',
        	[ // kierunek
        		'attribute' => 'kierunekStudiow_id',
        		'value' => 'kierunekStudiow.opis',
        		'label' => 'Nazwa kierunku'
        	],
        	[ // cykl
        		'attribute' => 'kierunekStudiow_id',
        		'value' => 'kierunekStudiow.cykl',
        		'label' => 'Cykl'
        	],
            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view}',
            		'buttons'=>
            		[
						'view' => function($url, $model, $key)
						{
							$icon = '<span class="glyphicon glyphicon-eye-open"></span>';
							$label = 'Pokaz';
							$url = Url::to(["view", 
									'id' => $model -> id,
									'kodKursu' => $model -> kodKursu,
									'wymaganie' => $model -> wymaganie,
									'nazwaPolska' => $model -> nazwaPolska,
									'nazwaAngielska' => $model -> nazwaAngielska,
									'kierunekStudiow_id' => $model -> kierunekStudiow_id,
									'published' => $model -> published,
									'user_id' => $model -> user_id,
									'grupaKursow' => $model -> grupaKursow,
									'litPodstawowa' => $model -> litPodstawowa,
									'litUzupelniajaca' => $model -> litUzupelniajaca
							]);
							return Html::a($icon, $url, ['title' => $label]);
						}
    				]
    		],
        ],
    ]); ?>

</div>