<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'sale');
?>
<div class="site pt-5">
    <div class="container">
        <h1 class="text-center pt-5"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
        <div class="line"></div>
    </div>

    <?php
    /** @var app\models\Horse[] $horses */
    if (empty($horses))
        echo Html::tag('h3', Yii::t('app', 'none'), ['class' => 'text-center']);
    ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 mb-5 px-3">
        <?php
        foreach ($horses as $horse) {
        ?>
            <div class="col py-3">
                <div class="card horses-card">
                    <div class="card-header">
                        <h3 class="card-title"><?= Html::encode($horse->name) ?></h3>
                    </div>

                    <img src="<?= '../images/horses/' . Html::encode($horse->image_name) ?>" class="card-img"
                         alt="<?= Html::encode($horse->name) . ' photo' ?>">

                    <div class="card-body pt-4">
                        <p class="card-text text-center">
                            <?= Html::encode($horse->father) ?><br>X<br><?= Html::encode($horse->mother) ?>
                        </p>
                    </div>
                    <div class="card-body pt-2">
                        <p class="card-text text-center">
                            <a href="<?= Html::encode($horse->url) ?>" class="btn outline-button2">
                                <?= Yii::t('app', 'more'); ?>
                            </a>
                        </p>
                    </div>
                    <div class="line-container">
                        <div class="card-line"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>