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
        'attribute' => 'Code',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Code'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-nom/editable']],
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
            'formOptions' => ['action' => ['/codes-nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Singular'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-nom/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Plural'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-nom/editable']],
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
