<?php

use kartik\editable\Editable;
use app\views\crud\GridHelper;

use app\models\crud\config\ConfigNomSouscatgram;
use app\models\crud\config\ConfigDomaine;
/* @var relatedModel Related model to this catégorie. */

$tmp = $relatedModel::find()->select(['Code'])->all();

foreach ($tmp as $m) {
    $flexArray[$m->Code] = $m->Code;
}

$tmp = ConfigNomSouscatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $sousCatgramArray[$m->option] = "$m->option ($m->description)";
}

$tmp = ConfigDomaine::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $domaineArray[$m->option] = "$m->option ($m->description)";
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
            'header' => Yii::t('app', 'Lemma'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'CatGram',
        'width' => '6rem',
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
        'attribute' => 'Dom',
        'vAlign' => 'middle',
        'editableOptions' => [
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => $domaineArray,
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
