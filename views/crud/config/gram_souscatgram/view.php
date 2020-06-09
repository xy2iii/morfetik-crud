<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Adjectif */
?>
<div class="adjectif-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'option',
        ],
    ]) ?>
</div>