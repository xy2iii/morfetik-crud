<?php

use kartik\editable\Editable;
use kartik\grid\GridView;
use Yii\helpers\Url;

use app\views\crud\GridHelper;
/* @var relatedModel Related model to this catégorie. */

return [
    GridHelper::getCheckboxColumn(),
    GridHelper::getSerialColumn(),
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
        'attribute' => 'option',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => 'Option',
            'size' => 'md',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    GridHelper::getActionColumn(),
];
