<?php
/* Widget used when expanding a row. Shows foreign key data. */

use yii\widgets\DetailView;
/* @var $model The related model, a model instance. */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'Code',
        'Rad',
        'S',
        'P',
    ],
]) ?>

