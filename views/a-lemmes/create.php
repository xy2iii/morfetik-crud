<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ALemmes */

$this->title = 'Create A Lemmes';
$this->params['breadcrumbs'][] = ['label' => 'A Lemmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alemmes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
