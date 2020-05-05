<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            Pour contacter les responsables de Morfetik:
        </p>
        <h2>Aude Grezka
            <a class='btn btn-primary' href="mailto:grezka@lipn.univ-paris13.fr">
                <i class='glyphicon glyphicon-send'></i> Email
            </a>
        </h2>
        <p>Responsable du projet Morfetik.</p>
        <h2>Équipe RCLN
            <a class='btn btn-primary' href="https://lipn.univ-paris13.fr/accueil/equipe/rcln/">
                <i class='glyphicon glyphicon-globe'></i> Site
            </a>
        </h2>
        <p>Équipe travaillant sur le traitement automatisé des languages.</p>
    </div>
</div>