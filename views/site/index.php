<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Lokotrans Cheval';
?>
<div class="site" >

<!--    Carousel    -->
    <div class="carousel-container">
        <div class="carousel-line-top"></div>
        <div id="carouselIndex" class="carousel slide index-carousel" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <?php
                /* @var app\models\Carousel[]  $carousel */
                for ($i = 0; $i < count($carousel); $i++) {
                    if ($i == 0) {
                        echo Html::begintag('div', ['class' => 'carousel-item active']);
                        echo Html::img('@web/images/carousel/' . $carousel[0]->image_name, ['alt' => 'carousel_1',
                            'class'=> 'block w-100']);
                ?>
                <div class="carousel-caption d-none d-md-block caption">
                    <p class="double-line-text">
                        <span class="inner-line"><?= Yii::t('app', 'welcome') ?></span>
                    </p>
                    <h6>LT Cheval</h6>
                    <div class="caption-line"></div>
                    <div class="caption-line mt-1"></div>
                </div>
                <?php
                    }
                    else {
                        echo Html::begintag('div', ['class' => 'carousel-item']);
                        echo Html::img('@web/images/carousel/' . $carousel[$i]->image_name,
                            ['alt' => 'carousel_' . $carousel[$i]->image_name, 'class'=> 'block w-100']);
                    }
                    echo Html::endTag('div');
                }
                ?>
                <div class="carousel-line-bot"></div>
            </div>
        </div>
    </div>

    <!---   News   --->
    <div class="colored-container px-3 news-container">
        <h1><?= Yii::t('app', 'news') ?></h1>
        <div class="row row-cols-1 row-cols-lg-3 card-row">
            <?php
            $currentLanguage = Yii::$app->language;
            /** @var app\models\News[] $news */
            foreach ($news as $newsItem) {
            ?>
            <div class="col mb-3">
                <div class="card index-card text-end">
                    <img src="<?= '../images/news/' . Html::encode($newsItem['image_name']) ?>" class="card-img-top"
                         alt="<?= Html::encode($newsItem['image_name']) . ' photo' ?>"
                    >

                    <div class="card-body">
                        <h3 class="card-title text-center"><?= Html::encode($newsItem['header_' . $currentLanguage]) ?></h3>
                        <p class="card-text text-center"><?= Html::encode($newsItem['body_' . $currentLanguage]) ?></p>
                        <?php
                        if (!empty($newsItem['url'])) {
                        ?>
                            <a href="<?= Html::encode($newsItem['url']) ?>" class="btn outline-button">
                                <?= Yii::t('app', 'more') ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="line-container">
                        <div class="card-line"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
