<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;

use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="min-vh-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="icon" href="<?= Url::to("@web/favicon-32x32.png") ?>" sizes="any" type="image/png">
    <link rel="icon" href="<?= Url::to("@web/favicon.svg") ?>" sizes="any" type="image/svg+xml">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="mb-5">
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-expand-lg navbar-dark bg-dark',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => [
                [
                    'label' => Yii::t('app', 'Search'),
                    'url' => ['/search'],
                    'active' => Yii::$app->requestedRoute === 'search',
                ],
                [
                    'label' => Yii::t('app', 'Edition'),
                    'url' => ['/site/edit-dashboard'],
                    'visible' => Yii::$app->user->can('editor'),
                    'active' => Yii::$app->requestedRoute === 'site/edit-dashboard',
                ],
                [
                    'label' => Yii::t('app', 'Admin'),
                    'url' => ['/admin'],
                    'visible' => Yii::$app->user->can('admin'),
                    'active' => Yii::$app->requestedRoute === 'admin',
                ],
                [
                    'label' => Yii::t('app', 'Publications'),
                    'url' => ['/site/publications'],
                    'active' => Yii::$app->requestedRoute === 'site/publications',
                ],
                [
                    'label' => Yii::t('app', 'About'),
                    'url' => ['/site/about'],
                    'active' => Yii::$app->requestedRoute === 'site/about',
                    'options' => ['class' => 'navbar-btn']
                ],
                [
                    'label' => Yii::t('app', 'Contact'),
                    'url' => ['/site/contact'],
                    'active' => Yii::$app->requestedRoute === 'site/contact',
                ],
                Yii::$app->user->isGuest ? ([
                    'label' => Yii::t('app', 'Login'),
                    'url' => ['/site/login'],
                    'active' => Yii::$app->requestedRoute === 'site/login',
                ]) : ('<li class="nav-item">'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ') ' . (Yii::$app->user->can('admin') ? '<span class="badge badge-danger">Admin</span>' : (Yii::$app->user->can('editor') ? '<span class="badge badge-info">' . Yii::t('app', 'Editeur') . '</span>' : '')),

                        ['class' => 'btn btn-link pl-0 logout']
                    )
                    . Html::endForm())
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => []
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer sticky-footer-wrapper bg-dark mt-2">
        <div class="container-fluid">
            <div class="row">
                <p class="col text-light">
                    <a href="https://lipn.univ-paris13.fr/">LIPN</a> - <?= date('Y') ?>
                </p>
                <p class="col text-light text-right">
                    <a href="https://lipn.univ-paris13.fr/accueil/equipe/rcln/">Équipe RCLN</a>
                </p>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>