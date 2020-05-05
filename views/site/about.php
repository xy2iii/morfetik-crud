<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Qui sommes-nous?</h2>
    <p class="lead text-danger">à remplir</p>
    <h2>Contibuteurs</h2>
    <h3>Contributeurs linguistiques</h3>
    <table class="table">
        <th>Contributeur</th>
        <th>Institution</th>
    </table>
    <h3>Modélisation et développements informatiques</h3>
    <table class="table">
        <tr>
            <th>Contributeur</th>
            <th>Contribution</th>
            <th>Institution</th>
        </tr>
        <tr>
            <td><a href="https://xy2.dev/">ELHAJ-LAHSEN Hugo</a> (mars-juin 2020)</td>
            <td>Développement du site</td>
            <td>LIPN - RCLN (UP13)</td>
        </tr>
        <tr>
            <td><a href="https://lipn.univ-paris13.fr/~cartier/">CARTIER Emmanuel</a> (mars-juin 2020)</td>
            <td>Coordinateur</td>
            <td>LIPN - RCLN (UP13)</td>
        </tr>
        <tr>
            <td>DIA Awa (nov.-dec. 2017)</td>
            <td>
                <p class="lead text-danger">à remplir</p>
            </td>
            <td>LIPN - RCLN (UP13)</td>
        </tr>
    </table>
    <h2>Financements</h2>
    <p class="lead text-danger">à remplir</p>
    <h2>Mentions légales</h2>
    <p class="lead text-danger">à remplir</p>
</div>