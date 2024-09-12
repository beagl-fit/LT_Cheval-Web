<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\helpers\Url;

BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias(
        '@web/images/icons/Lokotrans-logo-black.ico'), 'media' => '(prefers-color-scheme: light)']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias(
        '@web/images/icons/Lokotrans-logo-white.ico'), 'media' => '(prefers-color-scheme: dark)']);
//$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://fonts.googleapis.com/css2?family=Cardo&display=swap',]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header" class="navbar-collapsed">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/icons/Lokotrans-logo.png', ['alt' => Yii::$app->name, 'class' =>
            'brand-icon', 'style' => 'max-height: 130px']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand fixed-top', 'id' => 'navbar'],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'collapse navbar-collapse justify-content-end me-3', 'id' => 'navbarNav'],
        'items' => [
            [
                'label' => '<form method="post" action="' . Url::to(['site/change-language']) . '" class="language-form">' .
                    '<div class="btn-group" role="group" aria-label="Language selection">' .
                    Html::radio('language', Yii::$app->language === 'fr', [
                        'value' => 'fr',
                        'class' => 'btn-check',
                        'id' => 'lang-fr',
                        'autocomplete' => 'off',
                        'onclick' => 'this.form.submit();'
                    ]) .
                    Html::label('Fr', 'lang-fr', ['class' => 'nav-button']) .

                    Html::radio('language', Yii::$app->language === 'en', [
                        'value' => 'en',
                        'class' => 'btn-check',
                        'id' => 'lang-en',
                        'autocomplete' => 'off',
                        'onclick' => 'this.form.submit();'
                    ]) .
                    Html::label('En', 'lang-en', ['class' => 'nav-button']) .

                    Html::radio('language', Yii::$app->language === 'cs', [
                        'value' => 'cs',
                        'class' => 'btn-check',
                        'id' => 'lang-cz',
                        'autocomplete' => 'off',
                        'onclick' => 'this.form.submit();'
                    ]) .
                    Html::label('Cz', 'lang-cz', ['class' => 'nav-button']) .
                    '</div>' .
                    Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) .
                    '</form>',
                'encode' => false,
                'options' => ['class' => 'nav-item'],
            ],
            [
                'label' => Html::a(
                    Html::img(Url::to('@web/images/icons/menu_icon.svg'), [
                        'alt' => 'Menu',
                        'class' => 'menu_logo me-5 me-md-0',
                    ]),
                    '#',
                    [
                        'class' => 'nav-item toggler',
                    ]
                ),
                'encode' => false,
            ],
        ],
    ]);
    ?>
</header>

<div id="menu" class="collapsed-menu">
    <?php
    $currentAction = Yii::$app->controller->action->id;
    $currentPage = Yii::$app->request->get('page');

    echo Html::a(
            Html::img('@web/images/icons/Lokotrans-logo.png', [
                'alt' => Yii::$app->name,
                'class' => 'expanded_menu_logo',
            ]),
            ['/'],
            ['class' => 'logo-button']
        );

        echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'encodeLabels' => false,
                'items' => [
//                    ['label' => 'Home', 'url' => ['/']],
                    ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'stud'), 'UTF-8')), 'url' => ['/stud'], 'active' => $currentPage == 'stud',],
                    ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'gallery'), 'UTF-8')), 'url' => ['/gallery'], 'active' => $currentPage == 'gallery',],
                    [
                        'label' => Html::encode(mb_strtoupper(Yii::t('app', 'horses'), 'UTF-8')),
                        'url' => '#',
                        'items' => [
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'mares'), 'UTF-8')), 'url' => ['/site/mares']],
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'foals'), 'UTF-8')), 'url' => ['/site/foals']],
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'yearlings'), 'UTF-8')), 'url' => ['/site/yearlings']],
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'sale'), 'UTF-8')), 'url' => ['/site/sale']],
                        ],
                        'options' => ['class' => 'dropend', 'id' => 'horses'],
                        'active' => in_array($currentAction, ['mares', 'foals', 'yearlings', 'sale']),
                    ],
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'services'), 'UTF-8')), 'url' => ['/services'], 'active' => $currentPage == 'services',],
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'racing'), 'UTF-8')), 'url' => ['/site/racing'], 'active' => $currentAction == 'racing',],
                            ['label' => Html::encode(mb_strtoupper(Yii::t('app', 'contact'), 'UTF-8')), 'url' => ['contact'], 'active' => $currentPage == 'contact',],
                ]
        ]);
        echo Html::button('<img src="' . Url::to('@web/images/icons/close_icon.svg') . '" alt="Menu"
         class="expanded_menu_icon"/>', [
            'class' => 'btn toggler',
            'type' => 'button',
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => '#navbarNav,#menu',
            'aria-controls' => 'navbarNav menu',
            'aria-expanded' => 'false',
            'aria-label' => 'Toggle navigation',
            'style' => 'position: absolute; top: 5vw; right: 10vw;',
        ]);
    ?>
</div>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                &copy; 2024 <strong>Haras Lokotrans Cheval</strong>.
                <?= Html::encode(Yii::t('app', 'rights'), 'UTF-8') ?>
            </div>


            <div class="col-md-6 text-center text-md-end">
                <a href="https://www.facebook.com/profile.php?id=61564408629474&is_tour_completed"
                   target="_blank" rel="noreferrer" class="me-2" style="text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                         class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/ltcheval/" target="_blank" rel="noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                         class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
    document.querySelectorAll('.toggler').forEach(
        function(toggler) {
            toggler.addEventListener('click', function() {
                const menu = document.getElementById('menu');
                const body = document.body;

                // Toggle the full-screen menu
                if (menu.classList.contains('expanded-menu')) {
                    menu.classList.remove('expanded-menu');
                    body.classList.remove('no-scroll');
                } else {
                    menu.classList.add('expanded-menu');
                    body.classList.add('no-scroll');
                }
            });
        }
    );

    document.querySelectorAll('.navbar-toggler').forEach(
        function(toggler) {
            toggler.addEventListener('click', function() {
                const menu = document.getElementById('menu');
                const body = document.body;

                // Toggle the full-screen menu
                if (menu.classList.contains('expanded-menu')) {
                    menu.classList.remove('expanded-menu');
                    body.classList.remove('no-scroll');
                } else {
                    menu.classList.add('expanded-menu');
                    body.classList.add('no-scroll');
                }
            });
        }
    );

    document.addEventListener("DOMContentLoaded", () => {
        if(window.innerWidth < 1200) {
            const dropdown = document.getElementById('horses');
            dropdown.classList.add("dropdown");
            dropdown.classList.remove("dropend");
        }
    });
</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
