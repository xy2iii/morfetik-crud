<?php

use yii\helpers\Url;
use yii\helpers\Html;
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

$this->title = Yii::t('app', 'Search') .
    ($session->has('forme') ? ': ' . $session->get('forme') : '');

$this->params['breadcrumbs'][0] = $this->title;
?>


<div class="card mb-5">
    <div class="row no-gutters">
        <div class="col-md-9">
            <div class="card-body">
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
                        'placeholder' => 'Rechercher une forme : chevaux, mangeâmes...'
                    ]
                ]);
                echo $form->field($formModel, 'accent', [
                    'enableClientValidation' => false, // Don't show colored borders when input is correct.
                ])->checkbox()->label(
                    'Sensible aux accents<small class="ml-2">(prise en compte des accents dans la recherche pour une sélectivité plus grande des formes) </small>'
                );
                ActiveForm::end();
                Pjax::end();
                ?>
            </div>
        </div>

        <div class="col-md-3 d-none d-md-block">
            <ul class="list-group list-group-flush">
                <a class="list-group-item  list-group-item-action" type="button" data-toggle="modal" data-target="#userGuide" aria-expanded="false" aria-controls="userGuide">
                    Guide d'utilisation
                </a>
                <?= Html::a('Recherche avancée', ['search/advanced'], ['class' => 'list-group-item list-group-item-action', 'data-pjax' => 0]) ?>
            </ul>
        </div>
        <div class="d-md-none col">
            <ul class="list-group list-group-flush">
                <a class="list-group-item  list-group-item-action" type="button" data-toggle="modal" data-target="#userGuide" aria-expanded="false" aria-controls="userGuide">
                    Guide d'utilisation
                </a>
                <?= Html::a('Recherche avancée', ['search/advanced'], ['class' => 'list-group-item list-group-item-action', 'data-pjax' => 0]) ?>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div id="container-pjax">
            <?php
            $columns = [
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'width' => '50px',
                    'value' => function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    // Will pass expandRowKey and expandRowInd to the controller.
                    // See https://demos.krajee.com/grid#expand-row-column
                    'detailUrl' => Url::to(['expand-row']),
                    'detailRowCssClass' => '',
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                    'detailAnimationDuration' => 'fast',
                ],
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
                    },
                ],
                [
                    'attribute' => 'catgram',
                    'vAlign' => 'middle',
                    'width' => '4rem',
                ],
                [
                    'attribute' => 'temps',
                    'vAlign' => 'middle',
                    'width' => '8rem',
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
                [
                    'attribute' => 'lig',
                    'vAlign' => 'middle',
                    'width' => '4rem',
                ],
                [
                    'attribute' => 'graphsav',
                    'vAlign' => 'middle',
                    'width' => '4rem',
                ],
                [
                    'attribute' => 'notes',
                    'vAlign' => 'middle',
                    'width' => '4rem',
                ],
                [
                    'class' => '\kartik\grid\ActionColumn',
                    'header' => 'Ressources externes',
                    // Each callback is a new button.
                    'template' => '{neoveille} {franceterme}',
                    'buttons' => [
                        "neoveille" => function ($url, $model) {
                            return '
                            <a title="Néoveille: statistiques" href="https://tal.lipn.univ-paris13.fr/neoveille/html/phc_anglicismes/html/index.search.php?word='
                                . $model->lemme . '"><i class="fa fa-paper-plane"></i></a>
                            ';
                        },
                        "franceterme" => function ($url, $model) {
                            return '
                            <a title="FranceTerme: recherche du mot" href="http://www.culture.fr/franceterme/result?francetermeSearchTerme='
                                . $model->lemme . '&francetermeSearchDomaine=0&francetermeSearchSubmit=rechercher&action=search"><i class="fa fa-university"></i></a>
                            ';
                        },
                    ]
                ]
            ];
            if (isset($dataProvider)) {
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel, // Give to the grid a model that can search anywhere.
                    'filterUrl' => '@web/search',
                    'columns' => $columns,
                    'pjax' => true,
                    'pjaxSettings' => [
                        'options' => [
                            'id' => 'container-pjax',
                            'enablePushState' => false,
                        ],
                    ],
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                ]);
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="userGuide" tabindex="-1" role="dialog" aria-labelledby="User guide" aria-hidden="true">
    <?php require_once('_guide-utilisation.php') ?>
</div>