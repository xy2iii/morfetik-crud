<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CodesAdjectif */
?>
<div class="codes-adjectif-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Code',
            'Rad',
            'MS',
            'MP',
            'FS',
            'FP',
        ],
    ]) ?>

</div>
