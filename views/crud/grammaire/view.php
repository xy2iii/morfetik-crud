<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grammaire */
?>
<div class="grammaire-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Lemme',
            'Forme',
            'CatGram',
            'Gender',
            'Number',
            'Person',
            'Notes',
        ],
    ]) ?>

</div>
