<?php


/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'mares');
?>

<div id="mares" class="site py-5">
    <h1 class="text-center"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
    <div class="line"></div>

    <?php
    /** @var app\models\Horse[] $horses */
    if (empty($horses))
        echo Html::tag('h3', Yii::t('app', 'none'), ['class' => 'text-center']);
    echo Html::begintag('div', ['class' => 'row row-cols-1 row-cols-xl-2 py-5']);
    foreach ($horses as $horse) {
        ?>
        <div class="col py-3">
            <div class="card card-mares">
                <div class="card-header">
                    <img src="<?= '../images/horses/' . Html::encode($horse->image_name) ?>"
                         alt="<?= Html::encode($horse->name) . ' photo' ?>" class="card-img-top">
                </div>
                <div class="card-body">
                    <div class="card-title py-1">
                        <h3><?= Html::encode($horse->name) ?></h3>
                        <div class="row row-cols-1 row-cols-xl-2">
                            <div class="col">
                                <?= Yii::t('app', 'born') . ': ' . Html::encode($horse->birth)?>
                            </div>
                            <div class="col text-lg-end">
                                <?= Yii::t('app', 'owner') . ': ' . Html::encode($horse->owner)?>
                            </div>
                        </div>
                        <?php if ($horse->covered_by) { ?>
                            <p style="font-size: 15pt">
                                <?= Yii::t('app', 'covered')
                                . ' ' . Html::encode($horse->covered_by)?>
                            </p>
                        <?php } ?>
                    </div>
                    <hr>
                    <div class="scroll">
                        <span class="horse_name"><?= $horse->name ?></span>
                        <div class="parents">
                            <div class="horse">
                                <span class="horse_name"><?= Html::encode($horse->father) ?></span>
                                <div class="parents">
                                    <div class="horse">
                                        <span class="horse_name"><?= Html::encode($horse->father_father) ?></span>
                                    </div>
                                    <div class="horse">
                                        <span class="horse_name"><?= Html::encode($horse->father_mother) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="horse">
                                <span class="horse_name"><?= Html::encode($horse->mother) ?></span>
                                <div class="parents">
                                    <div class="horse">
                                        <span class="horse_name"><?= Html::encode($horse->mother_father) ?></span>
                                    </div>
                                    <div class="horse">
                                        <span class="horse_name"><?= Html::encode($horse->mother_mother) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div></div>
                    <div>
                        <h3><?= Yii::t('app', 'foals') ?></h3>
                        <ul>
                            <?php
                            $foals_array = explode(';', $horse->foals);

                            foreach ($foals_array as $foal) {
                                if ($foal != '')
                                    echo Html::tag('li', $foal);
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    echo Html::endTag('div');
    ?>
</div>
