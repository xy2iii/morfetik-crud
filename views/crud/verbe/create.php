<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Verbe */

?>
<div class="verbe-create">
    <?= $this->render('_form', [
        'model' => $model,
        'relatedModel' => $relatedModel,
    ]) ?>
</div>