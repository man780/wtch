<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Find';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('less2')):?>
        <?=Alert::widget([
                'options' => [
                    'class' => 'alert-warning',
                ],
                'body' => Yii::$app->session->getFlash('less2'),
            ]);
        ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($model, 'ing_id')->widget(Select2::className(), [
                'name' => 'ingredients',
                'data' => $model->getIngredientsAll(),
                'options' => [
                    'multiple' => true
                ],
            ]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <hr>
    <?php if (Yii::$app->session->hasFlash('finding')): ?>
        <h1>List of found dishes</h1>
        <?if(Yii::$app->session->getFlash('finding') != ""):?>
            <?=Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => Yii::$app->session->getFlash('finding'),
            ]);
            ?>
        <?endif;?>

    <ul class="list-group">
        <?foreach($list as $dish):?>
            <?if($count == $dish['ing_count']):?>
                <li class="list-group-item list-group-item-success"><?=$dish['dishname']?><span class="badge"><?=$dish['ings']?></span></li>
            <?else:?>
                <li class="list-group-item"><?=$dish['dishname']?><span class="badge"><?=$dish['ings']?></span></li>
            <?endif;?>
        <?endforeach;?>
    </ul>
    <?php endif; ?>
</div>
