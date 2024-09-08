<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'stud_header');
?>
<div class="site pt-5">

    <div class="row pt-5 justify-content-center">
        <div class="col-12 col-lg-6 position-relative zero-lr-padding" >
            <div class="colored-container px-5 py-5">
                <h1 class="text-center pt-5"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
                <div class="line mb-5"></div>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par1') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par2') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par3') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par4') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par5') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par6') ?>
                </p>
                <p class="text-center">
                    <?= Yii::t('app', 'stud_par7') ?>
                </p>
            </div>
            <div class="stud-line-transparent"></div>
        </div>
        <div class="col-12 col-lg-6 zero-lr-padding">
            <img src="../images/backgrounds/SantaBarbara(FR).jpg" alt="..." class="stud-image">
        </div>
    </div>
</div>


<script>
    // dynamical adjustment of the transparent line style
    document.addEventListener('DOMContentLoaded', function () {
        const coloredContainer = document.querySelector('.colored-container');
        const studLineTransparent = document.querySelector('.stud-line-transparent');

        function setTransparentLine() {
            if (window.innerWidth > 992) {
                const containerHeight = coloredContainer.offsetHeight;
                studLineTransparent.style.height = containerHeight + 'px';
                studLineTransparent.style.top = 0;
            }
            else {
                const containerHeight = coloredContainer.offsetHeight;
                studLineTransparent.style.top = containerHeight + 'px';
                studLineTransparent.style.height = 80 + 'px';
            }
        }

        setTransparentLine();

        window.addEventListener('resize', setTransparentLine);
    });
</script>