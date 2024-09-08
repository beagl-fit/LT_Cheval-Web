<?php

/* @var $this yii\web\View */
/* @var $carouselItems app\models\Carousel[] */
/* @var $carouselModel app\models\CarouselUpdateForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1 class="text-center py-3">
    Update Carousel
</h1>
<div class="container justify-content-center py-3 form-container">
    <!-- Form 1: Upload and Replace Carousel Image -->
    <?php
    $baseImageUrl = Yii::getAlias('@web/images/carousel/');

    $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>
    <div class="row row-cols-1 row-cols-lg-2">
        <div class="col align-content-center text-center">
            <div class="image-display">
                <img id="carousel-image-preview" src="" class="img-thumbnail" alt="no image selected">
            </div>

            <!-- Image list -->
            <div class="dropdown py-3">
                <?= $form->field($carouselModel, 'imageId')->dropDownList(
                    ArrayHelper::map($carouselItems, 'id', 'id'),
                    [
                        'prompt' => 'Select an image to replace',
                        'onchange' => 'updateImagePreview(this)',
                        'options' => array_reduce($carouselItems, function ($carry, $item) use ($baseImageUrl) {
                            $carry[$item['id']] = ['data-image-url' => $baseImageUrl . $item['image_name']];
                            return $carry;
                        }, []),
                    ]
                ) ?>
            </div>
        </div>
        <div class="col align-content-center text-center">
            <?= $form->field($carouselModel, 'imageFile')->fileInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Replace Selected Image',
                    ['name' => 'updateCarousel', 'class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <script>
        function updateImagePreview(select) {
            const imageUrl = select.options[select.selectedIndex].getAttribute('data-image-url');
            const imagePreview = document.getElementById('carousel-image-preview');
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

$baseImageUrl = Yii::getAlias('@web/images/carousel/');
$script = <<< JS
$(document).ready(function() {
    var baseUrl = "$baseImageUrl";

    $('.image-selector').on('click', function(e) {
        e.preventDefault();
        var imageName = $(this).data('image');
        var imageId = $(this).data('id');
        var imagePath = baseUrl + imageName;

        // Update the carousel image source and image_id attribute
        $('#carousel-image').attr('src', imagePath).attr('image_id', imageId);
    });
    
});
JS;
$this->registerJs($script);
?>