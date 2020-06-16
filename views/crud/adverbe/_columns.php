<?php

use kartik\editable\Editable;

use app\views\crud\GridHelper;
use app\models\crud\config\ConfigAdverbeSouscatgram;

$tmp = ConfigAdverbeSouscatgram::find()->select(['option', 'description'])->all();

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
        'attribute' => 'souscatgram',
        'vAlign' => 'middle',
        'editableOptions' => [
            'header' => Yii::t('app', 'Sous-catégorie grammaticale'),
            'inputType' => Editable::INPUT_DROPDOWN_LIST,
            'data' => $sousCatgramArray,
            'formOptions' => ['action' => ['editable']],
        ],
    ],
    GridHelper::getActionColumn(),
];
