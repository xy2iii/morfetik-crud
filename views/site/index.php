<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Morfetik';

$this->registerCss("
.fit-image{
    object-fit: cover;
    height: 100%;
}
");
?>
<div class="jumbotron">
    <div class="row">
        <div class="col-md-4">
            <h1 class="text-center">Morfetik</h1>
        </div>
        <div class="col-md-8">
            <h2 class>Une ressource lexicale pour le traitement automatique du langage</h2>
            <p class="text-justify">
                La ressource lexicale Morfetik est un dictionnaire morphologique des mots simples et composés du français (noms, adjectifs, déterminants, pronoms, verbes, adverbes, prépositions, conjonctions, interjections, locutions). Morfetik permet d'obtenir, pour n'importe quel mot français, l'ensemble de ses formes (pluriel des noms, féminin et pluriel des adjectifs, formes conjuguées des verbes, etc.), ou bien, réciproquement, d'identifier le mot (la forme de base, le "lemme") correspondant à n'importe quelle forme fléchie. La ressource recense actuellement plus de 100 000 mots.
            </p>
            <p class="d-flex align-items-end justify-content-end">
                <a class="btn btn-primary btn-lg" role="button" href="<?= Url::to(['/search']) ?>">
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

<div class="row">
    <div class="col d-flex justify-content-center" style="height: 200px;">
        <a href="https://www.culture.gouv.fr/Sites-thematiques/Langue-francaise-et-langues-de-France/La-DGLFLF" class="img-responsive fit-image">
            <img class="img-responsive fit-image" src="<?= Url::to('@web/img/dglflf.jpg') ?>" alt="Logo DGLFLF">
        </a>
        <a href="https://anr.fr/ProjetIA-10-LABX-0083" class="img-responsive fit-image pl-2">
            <img class="img-responsive fit-image" src="<?= Url::to('@web/img/labex.png') ?>" alt="Logo LABEX">
        </a>
        <a href="https://lipn.univ-paris13.fr/" class="img-responsive fit-image pl-4">
            <img src="<?= Url::to('@web/img/lipn.svg') ?>" alt="Logo LIPN">
        </a>
    </div>
</div>