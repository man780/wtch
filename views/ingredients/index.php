<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Dishes;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IngredientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingredients';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .dishes{
        background-color: #d9edf7;
        color: #31708f;
        border-radius: 5px;
        padding: 3px 5px;
    }
</style>
<div class="ingredients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ingredients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'ingname',
            [
                'label' => 'Dishes',
                'format' => 'html',
                'attribute'=>'dishname',
                //'filter' => ArrayHelper::map(Dishes::find()->asArray()->all(), 'id', 'dishname'),
                'filter' => false,
                'value' => function($model) {
                    foreach ($model->dishes as $dish) {
                        $dishNames[] = $dish->dishname;
                    }
                    return "<span class='dishes'>".implode("</span> <span class='dishes'>", $dishNames)."</span>";
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
