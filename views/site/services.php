<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'services_header');
?>
<div class="site pt-5">
    <img src="../images/backgrounds/IMG_1942.jpg" alt="..." class="services-image">
    <div class="row pt-5 justify-content-center">
        <div class="col-12 col-lg-9 col-xl-7 position-relative" style="margin: 2vw; padding: 0">
            <div class="colored-container px-5 py-5">
                <h1 class="text-center pt-5"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
                <div class="line mb-5"></div>
                <p class="text-center">
                    <?= Yii::t('app', 'services_par1') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'services_par2') ?>
                </p>
                <p class="text-center pt-3">
                    <a class="btn outline-button2 justify-content-center" href="contact">
                        <?= Yii::t('app', 'services_button') ?>
                    </a>
                </p>
            </div>
            <div class="services-line-transparent-h"></div>
            <div class="services-line-transparent-v"></div>
            <div class="services-line-transparent-h2"></div>
            <div class="services-line-transparent-v2"></div>
        </div>
        <img src="../images/backgrounds/IMG_2378.jpg" alt="..." class="services-image-2">
    </div>
</div>