<?php

use kartik\editable\Editable;
use app\views\crud\GridHelper;

return [
    GridHelper::getCheckboxColumn(),
    GridHelper::getSerialColumn(),
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Code',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Code'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Rad',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'width' => '40px',
        'editableOptions' => [
            'header' => Yii::t('app', 'Radical'),
            'size' => 'lg',
            'inputType' => Editable::INPUT_RANGE,
            'options' => [
                'options' => ['placeholder' => 'Radical (nombre de lettres à enlever)'],
                'html5Container' => ['style' => 'width:330px'],
                'html5Options' => ['min' => 0, 'max' => 10],
                'addon' => ['append' => ['content' => 'lettres']]
            ],
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'MS',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Masculine singular'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'MP',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Masculine plural'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'FS',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Feminine singular'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'FP',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Feminine plural'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    GridHelper::getActionColumn(),
];
