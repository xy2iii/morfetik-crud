<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CodesNom */
?>
<div class="codes-nom-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Code',
            'Rad',
            'S',
            'P',
        ],
    ]) ?>

</div>
