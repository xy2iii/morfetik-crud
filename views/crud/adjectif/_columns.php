<?php

use kartik\editable\Editable;
use kartik\grid\GridView;
use Yii\helpers\Url;

use app\views\crud\GridHelper;
use app\models\crud\config\ConfigAdjectifSouscatgram;
/* @var relatedModel Related model to this catégorie. */

$tmp = $relatedModel::find()->select(['Code'])->all();
foreach ($tmp as $m) {
    $flexArray[$m->Code] = $m->Code;
}

$tmp = ConfigAdjectifSouscatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $sousCatgramArray[$m->option] = "$m->option ($m->description)";
}

return [
    GridHelper::getCheckboxColumn(),
    GridHelper::getSerialColumn(),
    GridHelper::getExpandRowColumn(),
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lemme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => 'Lemme',
            'size' => 'md',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'CatGram',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Gramatical category'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'souscatgram',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Sous-catégorie grammaticale'),
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => $sousCatgramArray,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Flex',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Flexion'),
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => $flexArray,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'variante',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'editableOptions' => [
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'infos',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'editableOptions' => [
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Notes',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'editableOptions' => [
            'header' => 'Notes',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    GridHelper::getActionColumn(),
];
