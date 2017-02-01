<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use \kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Dishes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dishes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dishname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingredients')->widget(Select2::className(), [
        'name' => 'ingredients',
        //'value' => $known_language,
        'data' => $model->getIngredientsAll(),
        'options' => [
            'multiple' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
