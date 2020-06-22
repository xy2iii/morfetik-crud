<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grammaire */
?>
<div class="grammaire-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Lemme',
            'Forme',
            'CatGram',
            'souscatgram',
            'Gender',
            'Number',
            'Person',
            'variante',
            'infos',
            'Notes',
        ],
    ]) ?>

</div>