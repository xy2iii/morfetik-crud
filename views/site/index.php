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
                <h2 class>Une ressource lexicale pour le traitement automatique du language</h2>
                <p>
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
</div>