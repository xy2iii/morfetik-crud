<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Interface de modification Morfetik</h1>
        <div class="col-md-6">
            <h2>Lemmes</h2>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?= Url::toRoute('/adjectif'); ?>">Adjectifs</a></li>
                <li class="list-group-item"><a href="<?= Url::toRoute('/nom'); ?>">Noms</a></li>
                <li class="list-group-item"><a href="<?= Url::toRoute('/verbe'); ?>">Verbes</a></li>
                <li class="list-group-item"><a href="<?= Url::toRoute('/grammaire'); ?>">Grammaire</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Codes</h2>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?= Url::toRoute('/codes-adjectif'); ?>">Adjectifs</a></li>
                <li class="list-group-item"><a href="<?= Url::toRoute('/codes-nom'); ?>">Noms</a></li>
                <li class="list-group-item"><a href="<?= Url::toRoute('/codes-verbe'); ?>">Verbes</a></li>
            </ul>
        </div>
    </div>
</div>