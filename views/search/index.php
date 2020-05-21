<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\web\View;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use app\models\search\Forme;

/*
 * PJax - AJAX + pushState(): https://github.com/yiisoft/jquery-pjax
 * Javascript to:
 * - setup a pjax event that fires on search bar submit
 * - make sure that when results update, they go in the pjax container and
 * don't refresh the page
 */

$this->registerJs(
    "
    const form = '.ajax-submit';
    const pjaxContainer = '#container-pjax';

    $(document).pjax('a', pjaxContainer)
    $(document).on('submit', form, function(event) {
        $.pjax.submit(event, pjaxContainer)
    })
    $.pjax.defaults.timeout = 10000;
    ",
    View::POS_READY,
    'pjax-handler'
);

// Set the default values from the session.
$session = Yii::$app->session;
// session->get() will return null if nothing is set.
$formModel->forme = $session->get('forme');
$formModel->accent = $session->get('accent');
$formModel->strict = $session->get('strict');

$this->title = Yii::t('app', 'Search');
$this->params['breadcrumbs'][0] = $this->title;

echo Yii::$app->request->url;
?>

<div class='mb-4'>
    <?php Pjax::begin();
    $form = ActiveForm::begin(
        [
            'action' => Url::toRoute('/search'),
            'options' => [
                'class' => 'ajax-submit',
            ],
        ]
    );
    echo $form->field($formModel, 'forme', [
        'inputTemplate' => '<div class="input-group">
    <div class="input-group input-group-lg">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-search"></i>
            </span>
        </div>
        {input}
        <div class="input-group-append">
            <button class="btn btn-outline-primary">Rechercher</button>
        </div>
    </div>
</div>',
        'enableLabel' => false,
        'inputOptions' => [
            'placeholder' => 'Rechercher une forme: chevaux, mangeâmes...'
        ]
    ]);
    echo $form->field($formModel, 'accent', [
        'enableClientValidation' => false, // Don't show colored borders when input is correct.
    ])->checkbox()->label(
        'Sensible aux accents<small class="ml-2">Prend en compte tous les accents dans la recherche.</small>'
    );
    echo $form->field($formModel, 'strict', [
        'enableClientValidation' => false, // Don't show colored borders when input is correct.
    ])->checkbox()->label(
        'Recherche stricte<small class="ml-2">Le mot exact sera recherché: sinon, recherche tous les mots commencant par la recherche.</small>'
    );
    ActiveForm::end();
    Pjax::end();
    ?>
</div>
<div id="container-pjax">
    <?php
    $columns = [
        [
            'attribute' => 'lemme',
            'vAlign' => 'middle',
        ],
        [
            'attribute' => 'primaryCategory',
            'vAlign' => 'middle',
            'format' => 'html',
            'value' => function ($data) {
                $after = $data->isLocution()
                    ? '&nbsp;<span class="badge badge-secondary">Locution</span>'
                    : '';
                return Forme::categoryToLabel($data->primaryCategory) . $after;
            }
        ],
        [
            'attribute' => 'catgram',
            'vAlign' => 'middle',
            'width' => '4rem',
        ],
        [
            'attribute' => 'temps',
            'vAlign' => 'middle',
            'width' => '4rem',
        ],
        [
            'attribute' => 'num',
            'vAlign' => 'middle',
            'width' => '4rem',
        ],
        [
            'attribute' => 'genre',
            'vAlign' => 'middle',
            'width' => '4rem',
        ],
        [
            'attribute' => 'person',
            'vAlign' => 'middle',
            'width' => '4rem',
        ],
    ];
    if (isset($dataProvider)) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel, // Give to the grid a model that can search anywhere.
            'filterUrl' => '',
            'columns' => $columns,
            'pjax' => true,
            'pjaxSettings' => [
                'options' => [
                    'id' => 'container-pjax',
                ],
            ],
            'bordered' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
        ]);
    }
    ?>
</div>