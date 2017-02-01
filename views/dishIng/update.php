<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DishIng */

$this->title = 'Update Dish Ing: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dish Ings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dish-ing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
