<?php


/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::t('app', 'gallery');
?>
<div id="gallery" class="site py-5">
    <h1 class="text-center"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
    <div class="line mb-5"></div>


    <div class="p-4 colored-container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mx-auto">
            <?php
            /** @var app\models\Gallery[] $gallery */
            foreach ($gallery as $index => $image) { ?>
                <!-- Thumbnails -->
                <div class="col py-2">
                    <div class="image-container">
                        <img src="<?= '../images/gallery/' . Html::encode($image->image_name) ?>"
                             class="img-thumbnail"
                             alt="<?= Html::encode($image->image_name) ?>"
                             data-bs-toggle="modal"
                             data-bs-target="#imageModal<?= $index ?>">
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="imageModal<?= $index ?>" tabindex="-1"
                     aria-labelledby="imageModalLabel<?= $index ?>" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen modal-gallery">
                        <div class="modal-content" data-bs-theme="dark">
                            <button type="button" class="btn-close ms-auto pe-5" data-bs-dismiss="modal"
                                    aria-label="Close">
                            </button>
                            <div class="modal-body text-center">
                                <img src="<?= '../images/gallery/' . Html::encode($image->image_name) ?>"
                                     class="img-fluid modal-img"
                                     alt="<?= Html::encode($image->image_name) ?>">
                                <p class="mt-1">
                                    <?= Yii::t('app', 'author') . Html::encode($image->author) ?>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="prevImage<?= $index ?>"
                                        data-bs-target="#imageModal<?= ($index - 1 + count($gallery)) % count($gallery) ?>"
                                        data-bs-toggle="modal"><?= Yii::t('app', 'prev') ?></button>
                                <button type="button" class="btn btn-secondary" id="nextImage<?= $index ?>"
                                        data-bs-target="#imageModal<?= ($index + 1) % count($gallery) ?>"
                                        data-bs-toggle="modal"><?= Yii::t('app', 'next') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    // load all modals and set next/prev buttons
    document.addEventListener('DOMContentLoaded', function() {
        const modals = document.querySelectorAll('.modal');

        modals.forEach((modal, index) => {
            modal.addEventListener('show.bs.modal', function() {
                const prevButton = modal.querySelector(`#prevImage${index}`);
                const nextButton = modal.querySelector(`#nextImage${index}`);

                if (index === 0) {
                    prevButton.setAttribute('disabled', true);
                } else {
                    prevButton.removeAttribute('disabled');
                }
                if (index === modals.length - 1) {
                    nextButton.setAttribute('disabled', true);
                } else {
                    nextButton.removeAttribute('disabled');
                }
            });
            const content = modal.childNodes[1].childNodes[1]
            content.childNodes[3].addEventListener('click', function () {
                content.childNodes[1].click();
            });
            console.log(content);
        });

        console.log(modals.nextSibling)
    });
</script>