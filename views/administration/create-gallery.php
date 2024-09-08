<?php

/* @var $this yii\web\View */
/* @var $model app\models\GalleryForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1 class="text-center py-3">
    Create Gallery
</h1>
<!-- create news -->
<div class="container justify-content-center py-3 form-container">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    <div class="row px-5">
        <?= Html::submitButton('Create', ['name' => 'createGallery',
            'value' => 'submit', 'class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>