<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Edition';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 class="text-center mb-4">Interface de modification Morfetik</h1>
        <div class="row">
            <div class="col-md">
                <h3 class="text-center"><i class="fa fa-list"></i> Lemmes</h3>
                <ul class="list-group">
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/adjectif'); ?>">Adjectifs</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/nom'); ?>">Noms</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/verbe'); ?>">Verbes</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/adverbe'); ?>">Adverbes</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/grammaire'); ?>">Grammaire</a>
                </ul>
            </div>
            <div class="col-md">
                <h3 class="text-center"><i class="fa fa-pen-nib"></i> Codes</h3>
                <ul class="list-group">
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/codes-adjectif'); ?>">Adjectifs</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/codes-nom'); ?>">Noms</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/codes-verbe'); ?>">Verbes</a>
                </ul>
            </div>
            <div class="col-md">
                <h3 class="text-center"><i class="fa fa-cogs"></i> Configuration</h3>
                <ul class="list-group">
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/config/adjectif_souscatgram'); ?>"><strong>Adjectif</strong> : sous-catégorie grammaticale</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/config/adverbe_souscatgram'); ?>"><strong>Adverbe</strong> : sous-catégorie grammaticale</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/config/gram_catgram'); ?>"><strong>Grammaire</strong> : catégorie grammaticale</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/config/gram_souscatgram'); ?>"><strong>Grammaire</strong> : sous-catégorie grammaticale</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/config/nom_souscatgram'); ?>"><strong>Nom</strong> : sous-catégorie grammaticale</a>
                    <a class="list-group-item list-group-item-action text-center" href="<?= Url::toRoute('crud/config/verbe_souscatgram'); ?>"><strong>Verbe</strong> : sous-catégorie grammaticale</a>
                </ul>
            </div>
        </div>
    </div>
</div>