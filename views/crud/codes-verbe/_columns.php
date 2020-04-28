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
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Modele',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Model'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
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
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Rmodele',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Radical model'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Inf',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Infinitif'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indpr1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif présent: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indpr2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif présent: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indpr3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif présent: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indpr1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif présent: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indpr2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif présent: 2ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indpr3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif présent: 3ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indimp1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif imparfait: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indimp2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif imparfait: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indimp3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif imparfait: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indimp1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif imparfait: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indimp2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif imparfait: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indimp3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif imparfait: 3ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indps1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif passé simple: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indps2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif passé simple: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indps3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif passé simple: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indps1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif passé simple: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indps2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif passé simple: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indps3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif passé simple: 3ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indfut1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif futur: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indfut2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif futur: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indfut3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif futur: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indfut1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif futur: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indfut2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif futur: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Indfut3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Indicatif futur: 3ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Condpr1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Conditionnel présent: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Condpr2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Conditionnel présent: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Condpr3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Conditionnel présent: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Condpr1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Conditionnel présent: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Condpr2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Conditionnel présent: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Condpr3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Conditionnel présent: 3ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subpr1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif présent: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subpr2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif présent: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subpr3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif présent: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subpr1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif présent: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subpr2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif présent: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subpr3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif présent: 3ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subimp1S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif imparfait: 1ère personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subimp2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif imparfait: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subimp3S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif imparfait: 3ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subimp1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif imparfait: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subimp2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif imparfait: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Subimp3P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Subjonctif imparfait: 3ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Imppr2S',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Imparfait: 2ème personne singulier'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Imppr1P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Imparfait: 1ère personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Imppr2P',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Imparfait: 2ème personne pluriel'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'Ppres',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Participe présent'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'PpSM',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Participe présent singulier masculin'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'PpSF',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Participe présent singulier féminin'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'PpPM',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Participe présent pluriel masculin'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'PpPF',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Participe présent pluriel masculin'),
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['/codes-verbe/editable']],
        ],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'width' => '80px',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'
        ],
    ],

];
