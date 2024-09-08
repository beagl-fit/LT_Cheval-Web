<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Administration';
?>

<div class="administration-page">
    <h1 class="text-center">Administration</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <?= Html::a('Update Carousel', ['update-carousel'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <?= Html::a('Add News', ['create-news'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
            <div class="col-4">
                <?= Html::a('Update News', ['update-news'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <?= Html::a('Add Horse', ['create-horse'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
            <div class="col-4">
                <?= Html::a('Update Horse', ['update-horse'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <?= Html::a('Add Race', ['create-race'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
            <div class="col-4">
                <?= Html::a('Update Race', ['update-race'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <?= Html::a('Add Gallery Image', ['create-gallery'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
            <div class="col-4">
                <?= Html::a('Update Gallery Image', ['update-gallery'], ['class' => 'btn btn-primary btn-admin']) ?>
            </div>
        </div>
    </div>
</div>

<!-- Logout Button -->
<div class="logout-button text-end">
    <?= Html::beginForm(['/site/logout'], 'post') ?>
    <?= Html::submitButton(
        'Logout',
        ['class' => 'btn btn-danger btn-lg']
    ) ?>
    <?= Html::endForm() ?>
</div>
