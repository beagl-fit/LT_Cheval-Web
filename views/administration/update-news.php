<?php
/* @var $this yii\web\View */
/* @var $newsUpdateModel app\models\NewsForm */
/* @var $newsItems app\models\News[] */

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
        'options' => ['enctype' => 'multipart/form-data', 'id' => 'news-update-form'],
    ]); ?>

    <!-- Dropdown for selecting news item -->
    <?= $form->field($newsUpdateModel, 'id')->dropDownList(
        ArrayHelper::map($newsItems, 'id', 'header_cs'),
        [
            'prompt' => 'Select news to update',
            'id' => 'news-update-dropdown',
        ]
    ) ?>

    <!-- News update fields -->
    <?= $form->field($newsUpdateModel, 'header_cs')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'body_cs')->textarea(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'header_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'body_en')->textarea(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'header_fr')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'body_fr')->textarea(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'url')->textInput(['maxlength' => true]) ?>
    <?= $form->field($newsUpdateModel, 'deleted')->checkbox() ?>

    <div class="row px-5">
        <?= Html::submitButton('Update', ['name' => 'updateNews', 'class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

<?php
$newsItemsJs = json_encode(ArrayHelper::map($newsItems, 'id', function($model) {
    return [
        'id' => $model->id,
        'header_cs' => $model->header_cs,
        'body_cs' => $model->body_cs,
        'header_en' => $model->header_en,
        'body_en' => $model->body_en,
        'header_fr' => $model->header_fr,
        'body_fr' => $model->body_fr,
        'url' => $model->url,
        'deleted' => $model->deleted,
    ];
}));
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const newsItems = <?= $newsItemsJs ?>;
        const dropdown = document.getElementById('news-update-dropdown');
        const form = document.getElementById('news-update-form');

        dropdown.addEventListener('change', function () {
            const newsId = this.value;
            if (newsId) {
                const item = newsItems[newsId];

                if (item) {
                    // Populate the form fields
                    form.querySelector('[name="NewsForm[header_cs]"]').value = item.header_cs || '';
                    form.querySelector('[name="NewsForm[body_cs]"]').value = item.body_cs || '';
                    form.querySelector('[name="NewsForm[header_en]"]').value = item.header_en || '';
                    form.querySelector('[name="NewsForm[body_en]"]').value = item.body_en || '';
                    form.querySelector('[name="NewsForm[header_fr]"]').value = item.header_fr || '';
                    form.querySelector('[name="NewsForm[body_fr]"]').value = item.body_fr || '';
                    form.querySelector('[name="NewsForm[url]"]').value = item.url || '';
                }
            } else {
                // Clear the form fields if no item is selected
                form.querySelector('[name="NewsForm[id]"]').value = '';
                form.querySelector('[name="NewsForm[header_cs]"]').value = '';
                form.querySelector('[name="NewsForm[body_cs]"]').value = '';
                form.querySelector('[name="NewsForm[header_en]"]').value = '';
                form.querySelector('[name="NewsForm[body_en]"]').value = '';
                form.querySelector('[name="NewsForm[header_fr]"]').value = '';
                form.querySelector('[name="NewsForm[body_fr]"]').value = '';
                form.querySelector('[name="NewsForm[url]"]').value = '';
            }
        });
    });
</script>