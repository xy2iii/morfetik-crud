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
        <p>
            Pour contacter les responsables de Morfetik:
        </p>
        <h2>Aude Grezka
            <a class='btn btn-primary' href="mailto:grezka@lipn.univ-paris13.fr">
                <i class='fas fa-envelope'></i> Email
            </a>
        </h2>
        <p>Responsable du projet Morfetik.</p>
    </div>
</div>