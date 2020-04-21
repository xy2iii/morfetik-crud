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
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Lemme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Lemma'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Forme',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Form'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'CatGram',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Gramatical category'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Gender',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Gender'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Number',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Number'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Person',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Person'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Notes',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Notes'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/grammaire/editable']],
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
