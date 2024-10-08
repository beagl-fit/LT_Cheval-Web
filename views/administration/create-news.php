<?php

/* @var $this yii\web\View */
/* @var $newsCreateModel app\models\NewsForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1 class="text-center py-3">
    Create News
</h1>
<!-- create news -->
<div class="container justify-content-center py-3 form-container">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
    <?= $form->field($newsCreateModel, 'imageFile')->fileInput() ?>
    <?= $form->field($newsCreateModel, 'header_cs')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsCreateModel, 'body_cs')->textarea(['maxlength' => true]) ?>
    <?= $form->field($newsCreateModel, 'header_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsCreateModel, 'body_en')->textarea(['maxlength' => true]) ?>
    <?= $form->field($newsCreateModel, 'header_fr')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsCreateModel, 'body_fr')->textarea(['maxlength' => true]) ?>
    <?= $form->field($newsCreateModel, 'url')->textarea(['maxlength' => true]) ?>
    <div class="row px-5">
        <?= Html::submitButton('Create', ['name' => 'createNews',
            'value' => 'submit', 'class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>