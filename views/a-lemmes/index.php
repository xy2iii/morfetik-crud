<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ALemmesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lemmes: adjectifs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alemmes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Créer un adjectif', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'id' => 'kv-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'toolbar' => [
            [
                'content' =>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                    'type' => 'button',
                    'title' => 'Ajouter',
                    'class' => 'btn btn-success',
                ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['grid'], [
                        'class' => 'btn btn-secondary',
                        'title' => 'Reset',
                    ]),
            ],
            '{export}',
            '{toggleData}'
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [
            [
                'class' => '\kartik\grid\EditableColumn',
                'attribute' => 'ID',
                'editableOptions' => [
                    'header' => 'ID',
                    'inputType' => Editable::INPUT_TEXT,
                    'asPopover' => false,
                    'formOptions' => ['action' => ['/a-lemmes/editable']],
                ],
            ],
            [
                'class' => '\kartik\grid\EditableColumn',
                'attribute' => 'Lemme',
                'editableOptions' => [
                    'header' => 'Lemme',
                    'size' => 'md',
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/a-lemmes/editable']],
                ],
            ],
            [
                'class' => '\kartik\grid\EditableColumn',
                'attribute' => 'CatGram',
                'header' => 'Catégorie',
                'editableOptions' => [
                    'header' => 'Catégorie grammaticale',
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/a-lemmes/editable']],
                ],
            ],
            [
                'class' => '\kartik\grid\EditableColumn',
                'attribute' => 'Flex',
                'editableOptions' => [
                    'header' => 'Flexion',
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/a-lemmes/editable']],
                ],
            ],
            [
                'class' => '\kartik\grid\EditableColumn',
                'attribute' => 'Lig',
                'editableOptions' => [
                    'header' => 'Ligature',
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/a-lemmes/editable']],
                ],
            ],
            [
                'class' => '\kartik\grid\EditableColumn',
                'attribute' => 'Standard',
                'editableOptions' => [
                    'header' => 'Forme standard',
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/a-lemmes/editable']],
                ],
            ],
            'Notes',
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => true,
                'vAlign' => 'middle',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return '#' . $action;
                },
                'viewOptions' => ['title' => 'view', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => 'update', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'delete', 'data-toggle' => 'tooltip'],
            ],

        ],
        'responsive' => true,
        'hover' => true,
        'resizableColumns' => true,
        'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
    ]); ?>

    <?php Pjax::end(); ?>

</div>