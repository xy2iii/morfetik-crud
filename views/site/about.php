<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h2 class="mt-5">Qui sommes-nous?</h2>
    <p class="lead text-danger">à remplir</p>
    <h2 class="mt-5">Contibuteurs</h2>
    <h3>Contributeurs linguistiques</h3>
    <table class="table">
        <thead class="thead-light">
            <th>Contributeur</th>
            <th>Institution</th>
        </thead>
        <tbody>
            <tr>
                <td>GREZKA Aude</td>
                <td>CNRS/LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td>MATTHIEU-COLAS Michel</td>
                <td><a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a></td>
            </tr>
        </tbody>
    </table>
    <h3>Modélisation et développements informatiques</h3>
    <table class="table">
        <thead class="thead-light">
            <th>Contributeur</th>
            <th>Contribution</th>
            <th>Institution</th>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://xy2.dev/">ELHAJ-LAHSEN Hugo</a> (mars-juin 2020)</td>
                <td>Développement du site</td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td><a href="https://lipn.univ-paris13.fr/~cartier/">CARTIER Emmanuel</a> (mars-juin 2020)</td>
                <td>Coordinateur</td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td>DIA Awa (nov.-dec. 2017)</td>
                <td>Développement du site</td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
        </tbody>
    </table>
    <h2 class="mt-5">Financements</h2>
    <h3>2020</h3>
    <p>
        Ce travail a bénéficié partiellement d'une aide de l’Etat gérée par l'Agence Nationale de la Recherche au titre du programme "Investissements d’Avenir" portant la référence <a href="https://anr.fr/ProjetIA-10-LABX-0083">ANR-10-LABX-0083</a>. Il contribue à l’IdEx <a href="https://anr.fr/ProjetIA-18-IDEX-0001"> Université de Paris</a> - ANR-18-IDEX-0001. </p>
    <h3>2015-2019</h3>
    <p>
        Subvention de la <a href="https://www.culture.gouv.fr/Sites-thematiques/Langue-francaise-et-langues-de-France/La-DGLFLF">Délégation Générale à la Langue Française et aux Langues de France</a> (DGLFLF). La DGLFLF élabore la politique linguistique du Gouvernement en liaison avec les autres départements ministériels.
    </p>
    <h2 class="mt-5">Mentions légales</h2>
    <p class="lead text-danger">à remplir</p>
</div>