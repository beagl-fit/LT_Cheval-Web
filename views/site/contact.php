<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use voime\GoogleMaps\Map;

$this->title = 'Contact';

?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('bg-contact');
    });
</script>

<div class="site py-5">
    <h1 class="text-center"><?= Html::encode(mb_strtoupper($this->title, 'UTF-8')) ?></h1>
    <div class="line"></div>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 py-2 py-lg-0">
                <div class="container contact-container my-2">
                    <h3 class="text-center pb-1"><?= Yii::t('app', 'contact_cz') ?></h3>
                    <p class="text-center pt-3">
                        <h4 class="text-center">Michal Lisek</h4>
                        <h5 class="text-center"><?= Yii::t('app', 'manager') ?></h5>
                    <p class="pt-2 ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0"/>
                        </svg>
                        +420-721-754-851
                    </p>
                    <p class="ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                        </svg>
                        lisek@lokotrans.cz
                    </p>
                </div>
            </div>



            <div class="col-lg-4 py-2 py-lg-0">
                <div class="container contact-container my-2">
                    <h3 class="text-center pb-1"><?= Yii::t('app', 'contact_fr') ?></h3>
                    <p class="text-center pt-3">
                        <h4 class="text-center">Martina Bartholdyova</h4>
                        <h5 class="text-center"><?= Yii::t('app', 'assistant') ?></h5>
                    <p class="pt-2 ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0"/>
                        </svg>
                        +33-(0)7-87-07-14-41
                    </p>
                    <p class="ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                        </svg>
                        info@ltcheval.com
                    </p>
                </div>
            </div>

            <div class="col-lg-4 py-2 py-lg-0">
                <div class="container contact-container my-2">
                    <h3 class="text-center pb-1"><?= Yii::t('app', 'socials') ?></h3>
                    <div class="row justify-content-evenly">
                        <div class="col-2">
                            <a href="https://www.facebook.com/profile.php?id=61564408629474&is_tour_completed"
                               target="_blank" rel="noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="black"
                                     class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                </svg>
                            </a>
                        </div>

                        <div class="col-2">
                            <a href="https://www.instagram.com/ltcheval/" target="_blank" rel="noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="black"
                                     class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-5 mx-auto">
        <div class="col-xl-8 py-2 py-lg-0 my-3">
            <div class="container contact-container">
                <h3 class="text-center pb-1"><?= Yii::t('app', 'address') ?></h3>
                <h4 class="text-center">61170 Marchemaisons, France</h4>
                <img src="../images/icons/LT_Cheval_map.png" alt="..." class="contact-img">
            </div>
        </div>
        <div class="col-xl-4 contact-container text-center py-2 py-lg-0 my-3">
            <h3 class="mt-3"><?= Yii::t('app', 'contact_us') ?></h3>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['placeholder' => 'John Doe']) ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'DoeJ@gmail.com']) ?>

            <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Sale info']) ?>
            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'maxlength' => 500,'style' =>
                'resize: none; overflow: hidden;', 'oninput' => 'this.style.height = "";this.style.height
                 = this.scrollHeight + "px"',]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-contact', 'name' =>
                    'contact-button', 'style' => 'width: 100%']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
