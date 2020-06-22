<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Verbe */
?>
<div class="verbe-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Lemme',
            'CatGram',
            'souscatgram',
            'Flex',
            'pronominal',
            'Notes:ntext',
        ],
    ]) ?>

</div>