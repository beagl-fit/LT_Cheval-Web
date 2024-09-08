<?php
/* @var $this yii\web\View */
/* @var $model app\models\RaceForm */
/* @var $items app\models\Race[] */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
?>

<h1 class="text-center py-3">
    Update News
</h1>

<!-- update/delete -->
<div class="container form-container py-3">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data', 'id' => 'race-update-form'],
    ]); ?>

    <!-- Dropdown for selecting news item -->
    <?= $form->field($model, 'id')->dropDownList(
        ArrayHelper::map($items, 'id','horse', function($item) {
            return Yii::$app->formatter->asDate($item['date'], 'dd-MM-yyyy');
        }),
        [
            'prompt' => 'Select a race to update',
            'id' => 'race-update-dropdown',
        ]
    ) ?>

    <!-- News update fields -->
    <?= $form->field($model, 'date')->input('date') ?>
    <?= $form->field($model, 'length')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'horse')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'url')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'deleted')->checkbox() ?>

    <div class="row px-5">
        <?= Html::submitButton('Update', ['name' => 'updateRace', 'class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

<?php
$raceItemsJs = json_encode(ArrayHelper::map($items, 'id', function($model) {
    return [
        'id' => $model->id,
        'length' => $model->length,
        'state' => $model->state,
        'horse' => $model->horse,
        'url' => $model->url,
        'date' => $model->date,
        'deleted' => $model->deleted,
    ];
}));
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const raceItems = <?= $raceItemsJs ?>;
        const dropdown = document.getElementById('race-update-dropdown');
        const form = document.getElementById('race-update-form');

        dropdown.addEventListener('change', function () {
            const raceId = this.value;
            console.log(raceId);
            if (raceId) {
                const item = raceItems[raceId];

                if (item) {
                    // Populate the form fields
                    form.querySelector('[name="RaceForm[length]"]').value = item.length || '';
                    form.querySelector('[name="RaceForm[state]"]').value = item.state || '';
                    form.querySelector('[name="RaceForm[horse]"]').value = item.horse || '';
                    form.querySelector('[name="RaceForm[url]"]').value = item.url || '';
                    form.querySelector('[name="RaceForm[date]"]').value = item.date || '';
                }
            } else {
                // Clear the form fields if no item is selected
                form.querySelector('[name="RaceForm[id]"]').value = '';
                form.querySelector('[name="RaceForm[length]"]').value = '';
                form.querySelector('[name="RaceForm[state]"]').value = '';
                form.querySelector('[name="RaceForm[horse]"]').value = '';
                form.querySelector('[name="RaceForm[url]"]').value = '';
                form.querySelector('[name="RaceForm[date]"]').value = '';
            }
        });
    });
</script>