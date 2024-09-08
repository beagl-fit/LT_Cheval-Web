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
        'options' => ['class' => 'collapse navbar-collapse justify-content-end', 'id' => 'navbarNav'],
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
</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
