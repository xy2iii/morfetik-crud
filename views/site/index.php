<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Morfetik';
?>
<div class="site-index">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <h1 class="text-center">Morfetik</h1>
            </div>
            <div class="col-md-8">
                <h2 class>Une resource lexicale pour le traitement automatique du language</h2>
                <p>
                    Morfetik donne, à partir d'un mot, l'ensemble de ses formes.
                    Elle peut également donner le mot de base à partir d'une forme.
                    Recensant plus de 100 000 mots, c'est le dictionnaire morphologique le plus complet à l'heure actuelle.
                    Morfetik peut être utilisé pour le traitement automatique du language.
                </p>
                <p class="d-flex align-items-end justify-content-end">
                    <a class="btn btn-primary btn-lg" role="button" href="<?= Url::to(['site/publications']) ?>">
                        <i class="fas fa-search"></i> Rechercher
                    </a>
                    <a class="ml-3 btn btn-outline-primary btn-sm" role="button" href="<?= Url::to(['site/publications']) ?>">
                        <i class="fas fa-book"></i>
                        En savoir plus...
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>