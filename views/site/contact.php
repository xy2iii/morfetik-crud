<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
        <h2 class="mt-4">Aude Grezka
            <a class='btn btn-primary' href="mailto:grezka@lipn.univ-paris13.fr">
                <i class='fas fa-envelope'></i> Email
            </a>
            <a class='btn btn-primary' href="https://lipn.univ-paris13.fr/~grezka/">
                <i class='fas fa-globe'></i> Site
            </a>
        </h2>
        <p>Responsable du projet Morfetik.</p>
        <p><strong>CNRS - Équipe RCLN (LIPN)</strong>
            <a class='btn btn-sm btn-secondary' href="https://lipn.univ-paris13.fr/accueil/equipe/rcln/">
                <i class='fas fa-globe'></i> Site
            </a>
            <br>Équipe travaillant sur le traitement automatisé des languages.</p>

    </div>
</div>