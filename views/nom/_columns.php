<?php

use yii\helpers\Url;
use kartik\editable\Editable;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'ID',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'ID'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lemme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Lemma'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'CatGram',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Gramatical category'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Flex',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Flexion'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Dom',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Dom'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Grs',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Grs'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Maj',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Maj'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lig',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Ligature'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Standard',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Standard'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Notes',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Notes'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/nom/editable']],
        ],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'width' => '80px',
        'vAlign' => 'middle',
        'dropdown' => false,
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'Voir', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Mettre a jour', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Supprimer',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Êtes-vous sûr?',
            'data-confirm-message' => 'Êtes-vous sûr de vouloir supprimer cet objet?'
        ],
    ],

];
