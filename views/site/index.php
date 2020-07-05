<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Morfetik';

$this->registerCss("
.fit-image > img{
    width:150px;
    object-fit: cover;
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
                La ressource lexicale Morfetik est un dictionnaire morphologique des mots simples et composés du français (noms, adjectifs, déterminants, pronoms, verbes, adverbes, prépositions, conjonctions, interjections, locutions, etc.). Morfetik permet d'obtenir, pour n'importe quel mot français, l'ensemble de ses formes (pluriel des noms, féminin et pluriel des adjectifs, formes conjuguées des verbes, etc.), ou bien, réciproquement, d'identifier le mot (la forme de base, le "lemme") correspondant à n'importe quelle forme fléchie. Morfetik constitue un ensemble évolutif destiné à s'enrichir progressivement afin d'améliorer la chaîne de traitement des donneés textuelles.
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

<div class="row pl-3 pr-3 text-justify">
    <div class="col">
        <p>
            Un dictionnaire classique recense <strong>les lemmes</strong> d'une langue mais non <strong>les formes</strong> de ce lemme. Ainsi, quand cette langue est flexionnelle comme le français, l'entrée du dictionnaire se fait au moyen d'une forme dite « canonique » : par exemple pour les noms : au singulier (« chevaux » → « cheval »), pour les verbes : à l'infinitif (« finissons » → « finir »), etc. Une langue flexionnelle est une langue dans laquelle les mots (lemmes) changent de forme selon leur rapport grammatical aux autres mots, dans une phrase. De nombreux mots sont <em>variables</em> : ils changent de forme selon le contexte d'usage. On dit d'eux qu'ils subissent le jeu de la <em>flexion</em> et les formes sont dites <em>fléchies</em>.
        </p>
        <p>
            Le moteur de flexion Morfetik peut ainsi produire l’ensemble des formes fléchies d’un mot (pluriel des noms, féminin et pluriel des adjectifs, formes conjuguées des verbes, etc.) mais peut également être exploité pour reconnaître des formes inconnues (la forme de base, le "lemme"). Par exemple, si l'on saisit la forme <em>joues</em>, on obtiendra les 3 réponses suivantes :

            <ul>
                <li><em>joue</em>, nom féminin, pluriel</li>
                <li><em>jouer</em>, verbe à l’indicatif présent, 2e personne du singulier</li>
                <li><em>jouer</em>, verbe au subjonctif présent, 2e personne du singulier</li>
            </ul>
            En cliquant sur le mot <em>jouer</em>, on obtiendra toute sa conjugaison.</p>
        <p>
            Le système ainsi conçu permet de générer automatiquement l’ensemble des formes simples et complexes du français, d’apporter des informations sémantiques lorsque cela est nécessaire (domaines, par exemple), de contexte (analyse et suivi du mot dans la presse), etc.
        </p>
    </div>
</div>

<div class="row">
    <div class="col d-flex flex-wrap align-items-center  justify-content-center" style="">
        <a href="https://www.culture.gouv.fr/Sites-thematiques/Langue-francaise-et-langues-de-France/La-DGLFLF" class="fit-image">
            <img class="img-responsive" src="<?= Url::to('@web/img/ministere-culture.png') ?>" alt="Logo DGLFLF">
        </a>
        <a href="https://anr.fr/ProjetIA-10-LABX-0083" class="fit-image pl-2">
            <img class="img-responsive" src="<?= Url::to('@web/img/labex.jpg') ?>" alt="Logo LABEX">
        </a>
        <a href="https://anr.fr/" class="fit-image pl-4">
            <img class="img-responsive" src="<?= Url::to('@web/img/anr.png') ?>" alt="Logo ANR">
        </a>
        <a href="http://www.cnrs.fr/fr/page-daccueil" class="fit-image pl-4">
            <img class=" img-responsive" src="<?= Url::to('@web/img/cnrs.png') ?>" alt="Logo CNRS">
        </a>
        <a href="https://lipn.univ-paris13.fr/" class="fit-image pl-4">
            <img class="img-responsive" src="<?= Url::to('@web/img/lipn.svg') ?>" alt="Logo LIPN">
        </a>
        <a href="https://www.univ-paris13.fr/" class="fit-image pl-4">
            <img class="img-responsive" src="<?= Url::to('@web/img/uspn.jpg') ?>" alt="Logo USPN">
        </a>
    </div>
</div>