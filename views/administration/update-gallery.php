<?php

/* @var $this yii\web\View */
/* @var $items app\models\Gallery[] */
/* @var $model app\models\GalleryForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1 class="text-center py-3">
    Update Gallery
</h1>
<div class="container justify-content-center py-3 form-container">
    <?php
    $baseImageUrl = Yii::getAlias('@web/images/gallery/');

    $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>
    <div class="row row-cols-1 row-cols-lg-2">
        <div class="col align-content-center text-center">
            <div class="image-display">
                <img id="gallery-image-preview" src="" class="img-thumbnail" alt="no image selected">
            </div>

            <!-- Image list -->
            <div class="dropdown py-3">
                <div class="form-group">
                    <?= $form->field($model, 'id')->dropDownList(
                        ArrayHelper::map($items, 'id', 'id'),
                        [
                            'prompt' => 'Select an image to update',
                            'onchange' => 'updateImagePreview(this)',
                            'options' => array_reduce($items, function ($carry, $item) use ($baseImageUrl) {
                                $carry[$item['id']] = ['data-image-url' => $baseImageUrl . $item['image_name']];
                                return $carry;
                            }, []),
                            'id' => 'gallery-update-dropdown',
                        ]
                    ) ?>
                </div>
            </div>
        </div>
        <div class="col align-content-center text-center">
            <?= $form->field($model, 'author')->textInput()->label('Author') ?>
            <?= $form->field($model, 'deleted')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton('Update Selected Image',
                    ['name' => 'updateGallery', 'class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <script>
        function updateImagePreview(select) {
            const imageUrl = select.options[select.selectedIndex].getAttribute('data-image-url');
            const imagePreview = document.getElementById('gallery-image-preview');
            imagePreview.src = imageUrl;
            imagePreview.alt = "Selected Image";
        }
    </script>
</div>

<div class="row justify-content-end pt-5">
    <div class="col-3 text-end">
        <?= Html::a('Back To Administration', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

<?php
$galleryItemsJs = json_encode(ArrayHelper::map($items, 'id', function($model) {
    return [
        'id' => $model->id,
        'author' => $model->author,
        'deleted' => $model->deleted,
    ];
}));
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const galleryItems = <?= $galleryItemsJs ?>;
        const dropdown = document.getElementById('gallery-update-dropdown');
        const form = document.getElementById('w0');

        dropdown.addEventListener('change', function () {
            const galleryId = this.value;
            if (galleryId) {
                const item = galleryItems[galleryId];

                if (item) {
                    // Populate the form fields
                    form.querySelector('[name="GalleryForm[author]"]').value = item.author || '';
                }
            } else {
                // Clear the form fields if no item is selected
                form.querySelector('[name="GalleryForm[id]"]').value = '';
                form.querySelector('[name="GalleryForm[author]"]').value = '';
            }
        });
    });
</script>