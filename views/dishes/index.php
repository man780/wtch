<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Ingredients;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DishesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dishes';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .ingredients{
        background-color: #d9edf7;
        color: #31708f;
        border-radius: 5px;
        padding: 3px 5px;
    }
</style>
<div class="dishes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dishes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'dishname',
            [
                'label' => 'Ingredients',
                'format' => 'html',
                'attribute'=>'ingname',
                'filter' => ArrayHelper::map(Ingredients::find()->asArray()->all(), 'id', 'dishname'),
                'value' => function($model) {
                    //if(!is_array($model->ingredients) || !is_object($model->ingredients))return;
                    foreach ($model->ingredients as $dish) {
                        $ingNames[] = $dish->ingname;
                    }
                    if(is_array($ingNames))
                    return "<span class='ingredients'>".implode("</span> <span class='ingredients'>", $ingNames)."</span>";
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
