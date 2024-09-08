<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HorseForm $model */
/** @var ActiveForm $form */
?>


<h1 class="text-center py-3">
    Add Horse
</h1>


<div class="container justify-content-center py-3 form-container">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'birth')->input('date') ?>
    <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'father_father')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'father_mother')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mother_father')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'mother_mother')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sex')->dropDownList([
        'M' => 'Male',
        'F' => 'Female',
    ], ['prompt' => 'Select Sex']) ?>
    <?= $form->field($model, 'status')->dropDownList([   // Assuming 'sex' is a predefined list
        'foal' => 'Foal',
        'yearling' => 'Yearling',
        'none' => 'none',
    ], ['prompt' => 'Select Status (default: none)']) ?>
    <?= $form->field($model, 'foals')->textarea(['maxlength' => true,
        'placeholder' => "Use semicolon to divide individual foals\r\nfoal1;foal2;..."]) ?>
    <?= $form->field($model, 'mare')->checkbox() ?>
    <?= $form->field($model, 'for_sale')->checkbox() ?>
    <?= $form->field($model, 'covered_by')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="row px-5">
        <?= Html::submitButton('Create', ['name' => 'createHorse',
            'value' => 'submit', 'class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>