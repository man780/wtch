<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DishIngSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dish Ings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-ing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dish Ing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dish_id',
            'ing_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
