<?php
use yii\helpers\Html;
use mickgeek\daslider\Widget as DaSlider;
$this->title = 'Dastur haqida';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?php DaSlider::begin([
            'clientOptions' => ['bgincrement' => 10, 'interval' => 3000],
        ]); ?>
        <div class="da-slide">
            <h2>Opera</h2>
            <p>Opera is a web browser developed by Opera Software. The latest version currently runs on Microsoft Windows and OS X operating systems and uses the Blink layout engine.</p>
            <?= Html::a('Read more', '#', ['class' => 'da-link btn btn-default btn-lg']) ?>

            <div class="da-img">
                <?= Html::img('/img/1.png', ['alt' => 'Opera']) ?>
            </div>
        </div>
        <div class="da-slide">
            <h2>CloneDVD</h2>
            <p>CloneDVD is a proprietary DVD cloning software, developed by Elaborate Bytes, that can be used to make backup copies of any DVD movie not copy-protected.</p>
            <?= Html::a('Read more', '#', ['class' => 'da-link btn btn-default btn-lg']) ?>

            <div class="da-img">
                <?= Html::img('/img/2.png', ['alt' => 'CloneDVD']) ?>
            </div>
        </div>
        <div class="da-slide">
            <h2>CloneDVD</h2>
            <p>CloneDVD is a proprietary DVD cloning software, developed by Elaborate Bytes, that can be used to make backup copies of any DVD movie not copy-protected.</p>
            <?= Html::a('Read more', '#', ['class' => 'da-link btn btn-default btn-lg']) ?>

            <div class="da-img">
                <?= Html::img('/img/2.png', ['alt' => 'CloneDVD']) ?>
            </div>
        </div>
        <?php DaSlider::end(); ?>
    </div>

</div>
