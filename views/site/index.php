<?php

use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Morfetik';
?>
<div class="site-index">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4 order-md-2">
                <h1 class="text-center">Morfetik</h1>
                <img class="img-responsive center-block" src="<?= Url::to('@web/img/lipn.svg') ?>" alt="Logo LIPN">
                <small class="center-block text-center">Un projet de <a href="https://lipn.univ-paris13.fr/accueil/equipe/rcln/">l'équipe RCLN</a> du <a href="https://lipn.univ-paris13.fr/">Laboratoire d'Informatique de Paris Nord</a></small>
            </div>
            <div class="col-md-8">
                <h2><b>Qu'est-ce que Morfetik?</b></h2>
                <p class="lead"><i>Morfetik est une resource lexicale pour le traitement du language automatique.</i></p>
                <p>
                    Morfetik donne, à partir d'un mot, l'ensemble de ses formes.
                    Elle peut également donner le mot de base à partir d'une forme.
                    Recensant plus de 100 000 mots, c'est le dictionnaire morphologique le plus complet à l'heure actuelle.
                    Morfetik peut être utilisé pour le traitement automatique du language. <small><?= Html::a('En savoir plus...', ['site/publications']) ?></small>
                </p>
            </div>
        </div>
    </div>
</div>