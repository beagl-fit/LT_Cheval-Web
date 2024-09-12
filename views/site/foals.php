<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'foals');

/** @var app\models\Horse[] $horses */
$horsesJson = json_encode($horses);
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('bg-foals');

        if (<?= $horsesJson ?>.length < 3) {
            const buttons = document.getElementsByName('carusel_btn');
            buttons.forEach(function(button) {
                button.classList.add('visually-hidden');
            });
        }
    });
</script>
<div class="yearlings"></div>
<div class="site pt-5">
    <div class="container">
        <h1 class="text-center pt-5"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
        <div class="line"></div>
    </div>

    <?php
    if (empty($horses))
        echo Html::tag('h3', Yii::t('app', 'none'), ['class' => 'text-center']);
    else {
    ?>
    <div id="carouselExample" class="carousel carousel-dark slide"  data-bs-interval="false" data-ride="carousel"
         data-pause="hover">
        <div class="carousel-inner">

            <?php
            for ($i = 0; $i < count($horses); $i++) {
                if ($i == 0)
                    echo Html::begintag('div', ['class' => 'carousel-item active']);
                else
                    echo Html::begintag('div', ['class' => 'carousel-item']);
            ?>
                <div class="row justify-content-center mx-auto">
                    <div class="col-10 col-lg-5 py-3">
                        <div class="card horses-card">
                            <img src="<?= '../images/horses/' . Html::encode($horses[$i]->image_name) ?>"
                                 class="card-img-top" alt="<?= Html::encode($horses[$i]->name) ?> . photo">

                            <div class="card-body pt-4">
                                <h3 class="card-title text-center"><?= Html::encode($horses[$i]->name) ?></h3>
                                <p class="card-text text-center">
                                    <?= Html::encode($horses[$i]->sex) . ' ' .
                                    Yii::t('app', 'born') . ' ' .
                                    Html::encode($horses[$i]->birth) ?>
                                </p>
                                <p class="card-text text-center">
                                    <?= Html::encode($horses[$i]->father) .
                                    '<br>X<br>' . Html::encode($horses[$i]->mother) ?>
                                </p>
                            </div>
                            <div class="line-container">
                                <div class="card-line"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    if ($i < count($horses)) {
                    ?>
                        <div class="col-10 col-lg-5 py-3">
                            <div class="card horses-card">
                                <img src="<?= '../images/horses/' . Html::encode($horses[$i]->image_name) ?>"
                                     class="card-img-top" alt="<?= Html::encode($horses[$i]->name) ?> . photo">

                                <div class="card-body pt-4">
                                    <h3 class="card-title text-center"><?= Html::encode($horses[$i]->name) ?></h3>
                                    <p class="card-text text-center">
                                        <?= Html::encode($horses[$i]->sex) . ' ' .
                                        Yii::t('app', 'born') . ' ' .
                                        Html::encode($horses[$i]->birth) ?>
                                    </p>
                                    <p class="card-text text-center">
                                        <?= Html::encode($horses[$i]->father) .
                                        '<br>X<br>' . Html::encode($horses[$i]->mother) ?>
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
        <?php } ?>
    </div>

    <button name="carusel_btn" class="carousel-control-prev pe-3 pe-lg-5" type="button" data-bs-target="#carouselExample"
            data-bs-slide="prev">
        <img src="../images/icons/prev_icon.svg" alt="<"/>
        <span class="visually-hidden">Previous</span>
    </button>
    <button name="carusel_btn" class="carousel-control-next ps-3 ps-lg-5" type="button" data-bs-target="#carouselExample"
            data-bs-slide="next">
        <img src="../images/icons/next_icon.svg" alt=">"/>
        <span class="visually-hidden">Next</span>
    </button>
    <?php } ?>
</div>