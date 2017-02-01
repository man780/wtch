<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DishIng */

$this->title = 'Create Dish Ing';
$this->params['breadcrumbs'][] = ['label' => 'Dish Ings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-ing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
