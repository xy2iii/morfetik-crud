<?php

use kartik\editable\Editable;
use yii\helpers\Url;

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
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ID',
        'vAlign' => 'middle',
        'hAlign' => 'center',
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lemme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => 'Lemme',
            'size' => 'md',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/adjectif/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'CatGram',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => 'Catégorie grammaticale',
            'size' => 'md',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/adjectif/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Flex',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'editableOptions' => [
            'header' => 'Flexion',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/adjectif/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lig',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'editableOptions' => [
            'header' => 'Ligature',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/adjectif/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Standard',
        'vAlign' => 'middle',
        'hAlign' => 'center',
        'editableOptions' => [
            'header' => 'Standard',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/adjectif/editable']],
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
            'formOptions' => ['action' => ['/adjectif/editable']],
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
