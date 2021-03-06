<?php

use kartik\editable\Editable;
use app\views\crud\GridHelper;
use app\models\crud\config\ConfigGramCatgram;
use app\models\crud\config\ConfigGramSouscatgram;

$tmp = ConfigGramCatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $catgramArray[$m->option] = "$m->option ($m->description)";
}

$tmp = ConfigGramSouscatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $sousCatgramArray[$m->option] = "$m->option ($m->description)";
}

return [
    GridHelper::getCheckboxColumn(),
    GridHelper::getSerialColumn(),
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lemme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Lemma'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Forme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Form'),
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
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => $catgramArray,
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
        'attribute' => 'Gender',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Gender'),
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => ['' => '', 'M' => 'M', 'F' => 'F'],
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Number',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Number'),
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => ['' => '', 'S' => 'S', 'P' => 'P'],
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Person',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Person'),
            'inputType' => Editable::INPUT_TEXT,
            'data' => ['' => '', '1' => '1', '2' => '2', '3' => '3'],
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'variante',
        'vAlign' => 'middle',
        'editableOptions' => [
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'infos',
        'vAlign' => 'middle',
        'editableOptions' => [
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Notes',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Notes'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    GridHelper::getActionColumn(),
];
