<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;
use app\models\Przedmiot;
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
        <?= Yii::$app->user->isGuest ? '' :  (Yii::$app->user->identity->groupId!='admin' ? '': Html::a('Stwórz Przedmiot', ['create', 'step'=>'13'], ['class' => 'btn btn-success'])) ?>
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
        	[ // specjalnosc
        		'attribute' => 'kierunekStudiow_id',
        		'value' => 'kierunekStudiow.specjalnosc',
        		'label' => 'Specjalność'
        	],
        
        	[ // cykl
        		'attribute' => 'kierunekStudiow_id',
        		'value' => 'kierunekStudiow.cykl',
        		'label' => 'Cykl'
        	],
        	['attribute' => 'published',
        			'value' => function($model){
        			return Przedmiot::opublikowany[$model->published];
        	}
        			],
            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view} {update} {delete} {publish}',
            		'buttons'=>
            		[
            			'update' => function($url, $model, $key)
            			{
	        				$icon = '<span class="glyphicon glyphicon-pencil"></span>';
	        				$label = 'Edytuj';
	        				$url = Url::to(["update", 'id' =>$model -> id, 'step' => '1']);
							return !(Yii::$app->user->isGuest) ?  Html::a($icon, $url, ['title' => $label]):'';
						},
						'delete' => function($url, $model, $key)
						{
							$icon = '<span class="glyphicon glyphicon-trash"></span>';
							$label = 'Usun';
							$url = Url::to(["delete", 'id' =>$model -> id, 'step' => '1']);
							return !(Yii::$app->user->isGuest) ?  Html::a($icon, $url, ['title' => $label]):'';
						},
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
									'kierunekNazwa' => $model -> kierunekStudiow ->opis,
									'kierunekSpec' => $model -> kierunekStudiow -> specjalnosc,
									'kierunekStopien' => $model -> kierunekStudiow -> stopien,
									'published' => $model -> published,
									'user_id' => $model -> user_id,
									'userName' => $model -> user -> name,
									'userSurname' => $model -> user -> surname,
									'userEmail' => $model -> user -> email,
									'grupaKursow' => $model -> grupaKursow,
									'litPodstawowa' => $model -> litPodstawowa,
									'litUzupelniajaca' => $model -> litUzupelniajaca,
									'forma' => $model -> kierunekStudiow -> forma,
									'rodzaj' => $model -> rodzaj
									
									
							]);
							return Html::a($icon, $url, ['title' => $label]);
						},
						'publish' => function($url, $model, $key)
						{
							$icon = '<span class="glyphicon glyphicon-ok"></span>';
							$label = 'Opublikuj';
							$url = Url::to(["opublikuj", 'id' =>$model -> id]);
							return !(Yii::$app->user->isGuest) ?  Html::a($icon, $url, ['title' => $label]):'';
						}
    				]
    				
    		],
        ],
    ]); ?>

</div>