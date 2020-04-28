<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nom */
?>
<div class="nom-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Lemme',
            'CatGram',
            'Flex',
            'Dom',
            'Grs',
            'Maj',
            'Lig',
            'Standard',
            'Notes:ntext',
        ],
    ]) ?>

</div>
