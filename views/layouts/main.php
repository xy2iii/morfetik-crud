<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="icon" href="/favicon-32x32.png" sizes="any" type="image/png">
    <link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => Yii::t('app', 'Publications'), 'url' => ['/site/publications']],
                ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
                ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
                Yii::$app->user->can('editor') ? ['label' => Yii::t('app', 'Edition'), 'url' => ['/site/edit-dashboard']] : '',
                Yii::$app->user->can('admin') ? ['label' => Yii::t('app', 'Admin'), 'url' => ['/admin']] : '',
                Yii::$app->user->isGuest ? (['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]) : ('<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ') ' . (Yii::$app->user->can('admin') ? '<span class="label label-danger">Admin</span>' : (Yii::$app->user->can('editor') ? '<span class="label label-info">' . Yii::t('app', 'Editeur') . '</span>' : '')),

                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>')
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left"><a href="https://lipn.univ-paris13.fr/">LIPN</a> - <?= date('Y') ?></p>
            <p class="pull-right"><a href="https://lipn.univ-paris13.fr/accueil/equipe/rcln/">Équipe RCLN</a></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>