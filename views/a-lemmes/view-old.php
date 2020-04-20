<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $model app\models\ALemmes */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'A Lemmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alemmes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Lemme',
            'CatGram',
            'Flex',
            'Lig',
            'Standard',
            'Notes:ntext',
        ],
    ]) ?>

</div>