<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Horse;

/** @var yii\web\View $this */
/** @var app\models\HorseForm $model */
/** @var app\models\Horse[] $items */

// Fetch horse names and ids for the dropdown
$horseList = ArrayHelper::map($items, 'id', 'name');
?>

<h1 class="text-center py-3">
    Update Horse
</h1>


<div class="container justify-content-center py-3 form-container">
    <?php $form = ActiveForm::begin([
        'id' => 'update-horse-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'id')->dropDownList(
        $horseList,
        [
            'prompt' => 'Select a horse',
            'id' => 'horse-dropdown',
        ]
    ) ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'birth')->textInput(['type' => 'date']) ?>
    <?= $form->field($model, 'father')->textInput() ?>
    <?= $form->field($model, 'mother')->textInput() ?>
    <?= $form->field($model, 'father_father')->textInput() ?>
    <?= $form->field($model, 'father_mother')->textInput() ?>
    <?= $form->field($model, 'mother_father')->textInput() ?>
    <?= $form->field($model, 'mother_mother')->textInput() ?>
    <?= $form->field($model, 'owner')->textInput()->label('Owner(s)') ?>
    <?= $form->field($model, 'sex')->dropDownList(['M' => 'Male', 'F' => 'Female']) ?>
    <?= $form->field($model, 'status')->dropDownList(['foal' => 'Foal', 'yearling' => 'Yearling', 'none' => 'None']) ?>
    <?= $form->field($model, 'mare')->checkbox() ?>
    <?= $form->field($model, 'for_sale')->checkbox() ?>
    <?= $form->field($model, 'url')->textInput() ?>
    <?= $form->field($model, 'foals')->textarea(['maxlength' => true,
        'placeholder' => "Use semicolon to divide individual foals\r\nfoal1;foal2;..."]) ?>
    <?= $form->field($model, 'covered_by')->textInput() ?>
    <?= $form->field($model, 'deleted')->checkbox() ?>
    <div class="row justify-content-center pb-3">
        <div class="col-7">
            <img src="" alt="no image" id="image" style="max-width: 100%">
        </div>
        <div class="col-5 justify-content-center align-content-center text-center">
            <?= $form->field($model, 'imageFile')->fileInput()->label("(no file chosen - nothing changes)") ?>
        </div>
    </div>

    <div class="row px-5">
        <?= Html::submitButton('Update', ['name' => 'updateHorse',
            'value' => 'submit', 'class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('horse-dropdown');
        dropdown.addEventListener('change', function() {
            const horseId = this.value;
            if (horseId) {
                fetch('/administration/get-horse-details?id=' + horseId)
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('[name="HorseForm[name]"]').value = data.name;
                        document.querySelector('[name="HorseForm[birth]"]').value = data.birth;
                        document.querySelector('[name="HorseForm[father]"]').value = data.father;
                        document.querySelector('[name="HorseForm[mother]"]').value = data.mother;
                        document.querySelector('[name="HorseForm[father_father]"]').value = data.father_father;
                        document.querySelector('[name="HorseForm[father_mother]"]').value = data.father_mother;
                        document.querySelector('[name="HorseForm[mother_father]"]').value = data.mother_father;
                        document.querySelector('[name="HorseForm[mother_mother]"]').value = data.mother_mother;
                        document.querySelector('[name="HorseForm[sex]"]').value = data.sex;
                        document.querySelector('[name="HorseForm[status]"]').value = data.status;
                        document.querySelector('[name="HorseForm[mare]"]').nextSibling.firstChild.checked = data.mare;
                        document.querySelector('[name="HorseForm[for_sale]"]').nextSibling.firstChild.checked = data.for_sale;
                        document.querySelector('[name="HorseForm[url]"]').value = data.url;
                        document.querySelector('[name="HorseForm[foals]"]').value = data.foals;
                        document.querySelector('[name="HorseForm[covered_by]"]').value = data.covered_by;
                        document.querySelector('[name="HorseForm[owner]"]').value = data.owner;
                        document.querySelector('[name="HorseForm[deleted]"]').nextSibling.firstChild.checked = data.deleted;
                        document.querySelector('[id="image"]').src = '../images/horses/' + data.image_name;
                    });
            }
        });
    });
</script>
