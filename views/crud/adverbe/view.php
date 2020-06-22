<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Adverbe */
?>
<div class="adverbe-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Lemme',
            'souscatgram',
            'variante',
            'infos',
            'Notes'
        ],
    ]) ?>

</div>