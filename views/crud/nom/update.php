<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nom */
?>
<div class="nom-update">

    <?= $this->render('_form', [
        'model' => $model,
        'relatedModel' => $relatedModel
    ]) ?>

</div>