<?php


/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'racing');
?>

<div id="racing" class="site py-5">
    <h1 class="text-center"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
    <div class="line"></div>

    <div class="row justify-content-evenly py-5 mx-auto">
        <div class="col-12 col-md-7 col-xl-3 mb-3 py-5 racing">
            <div class="card racing-card text-end">
                <img src="<?= Yii::getAlias('@web/images/racing/jersey_cz.png') ?>" class="card-img-top"
                     alt="jersey_cz">

                <div class="card-body">
                    <h3 class="card-title text-center"><?= Yii::t('app', 'racing_cz')?></h3>
                    <p class="card-text text-center"><?= Yii::t('app', 'racing_trainer') ?> -
                        Luboš Urbánek</p>
                </div>
                <div class="card-body text-center">
                    <div class="dropdown-center">
                        <button class="btn dropdown-toggle outline-button2" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <?= Yii::t('app', 'more') ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" rel="noreferrer" target="_blank"
                                   href="https://www.france-galop.com/fr/proprietaire/RXpGNHVkeFhub3A1VkY2bkF1YkNxdz09">
                                    France galop</a>
                            </li>
                            <li><a class="dropdown-item" rel="noreferrer" target="_blank"
                                   href="https://www.facebook.com/profile.php?id=100078463286870&locale=cs_CZ">Facebook
                            </a></li>
                            <li><a class="dropdown-item" rel="noreferrer" target="_blank"
                                   href="http://www.dostihyjc.cz/index.php?page=16&IDS=10222">Jockey club CZ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7 col-xl-3 mb-3 py-5 racing">
            <div class="card racing-card text-end">
                <img src="<?= Yii::getAlias('@web/images/racing/jersey_fr.png') ?>" class="card-img-top"
                     alt="jersey_fr">

                <div class="card-body">
                    <h3 class="card-title text-center"><?= Yii::t('app', 'racing_fr')?></h3>
                    <p class="card-text text-center"><?= Yii::t('app', 'racing_trainer') ?> -
                        Stephane Wattel
                    </p>
                </div>
                <div class="card-body text-center">
                    <div class="dropdown-center">
                        <button class="btn dropdown-toggle outline-button2" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <?= Yii::t('app', 'more') ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" rel="noreferrer" target="_blank" href="https://www.france-galop.com/en/trainer/aUJwQWYrYVRRN2kzcG9FN1dRN2tsdz09#entraineurs-prop">
                                    France galop</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7 col-xl-3 mb-3 py-5 racing">
            <div class="card racing-card text-end">
                <img src="<?= Yii::getAlias('@web/images/racing/jersey_sp.png') ?>" class="card-img-top"
                     alt="jersey_sp">

                <div class="card-body">
                    <h3 class="card-title text-center"><?= Yii::t('app', 'racing_sp')?></h3>
                    <p class="card-text text-center"><?= Yii::t('app', 'racing_trainer') ?> -
                        Guillermo Arizkorreta Elosegui</p>
                </div>
                <div class="card-body text-center">
                    <div class="dropdown-center">
                        <button class="btn dropdown-toggle outline-button2" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <?= Yii::t('app', 'more') ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" rel="noreferrer" target="_blank"
                                   href="https://guillermoarizkorreta.com/">
                                    <?= Yii::t('app', 'url') ?>
                            </a></li>
                            <li><a class="dropdown-item" rel="noreferrer" target="_blank"
                                   href="https://jockey-club.es/datos-de-preparadores/?trainer_name=G.+Arizkorreta">
                                    Jockey club ES</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h2><?= Yii::t('app', 'achievements') ?></h2>
        <div class="scroll-v">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><?= Yii::t('app', 'date');?></th>
                        <th scope="col"><?= Yii::t('app', 'state');?></th>
                        <th scope="col"><?= Yii::t('app', 'length');?></th>
                        <th scope="col"><?= Yii::t('app', 'horse');?></th>
                        <th scope="col">URL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /** @var app\models\Race[] $racing */
                    foreach ($racing as $race) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?= Html::encode(Yii::$app->formatter->asDate($race->date, 'php:d-m-Y')) ?>
                        </th>
                        <td><?= Html::encode($race->state) ?></td>
                        <td><?= Html::encode($race->length) ?></td>
                        <td><?= Html::encode($race->horse) ?></td>
                        <td>
                            <?= $race->url ? Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#C23775FF" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                                </svg>', $race->url, ["target"=>"_blank", "rel" => "noreferrer",]) : '' ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('bg-racing');
    });
</script>