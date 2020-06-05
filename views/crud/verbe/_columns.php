<?php

use kartik\editable\Editable;
use app\views\crud\GridHelper;
use app\models\enums\Pronominal;

return [
    GridHelper::getCheckboxColumn(),
    GridHelper::getSerialColumn(),
    GridHelper::getExpandRowColumn(),
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'ID',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'ID'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
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
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Gramatical category'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Flex',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Flexion'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lig',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Ligature'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Standard',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Ligature'),
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
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'pronominal',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Flexion'),
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => Pronominal::listData(),
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    GridHelper::getActionColumn(),
];
