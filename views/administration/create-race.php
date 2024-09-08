<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Race $model */
/** @var ActiveForm $form */
?>

<h1 class="text-center py-3">
    Add Race
</h1>

<div class="create-race container form-container py-3">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'date')->input('date') ?>
        <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'horse')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        <div class="form-group row px-5">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>