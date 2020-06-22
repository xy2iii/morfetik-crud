<?php

use yii\widgets\DetailView;

use app\models\enums\Pronominal;

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
            'variante',
            'infos',
            [
                'attribute' => 'pronominal',
                'value' => Pronominal::getLabel($model->pronominal),
            ],
            'Notes:ntext',
        ],
    ]) ?>

</div>