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

$this->title = Yii::t('app', 'Search') .
    ($session->has('forme') ? ': ' . $session->get('forme') : '');

$this->params['breadcrumbs'][0] = $this->title;
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
        'Sensible aux accents<small class="ml-2">(prise en compte des accents dans la recherche pour une sélectivité plus grande des formes) </small>'
    );
    echo $form->field($formModel, 'strict', [
        'enableClientValidation' => false, // Don't show colored borders when input is correct.
    ])->checkbox()->label(
        'Recherche stricte<small class="ml-2">(recherche exacte du mot tapé ; sinon, recherche de tous les mots commençant par le mot tapé)</small>'
    );
    ActiveForm::end();
    Pjax::end();
    ?>
</div>
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
    ];
    if (isset($dataProvider)) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel, // Give to the grid a model that can search anywhere.
            'filterUrl' => '@web/search',
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
        ]);
    }
    ?>
</div>
<h1>Guide d'utilisation</h1>
<p>
    Morfetik permet de rechercher un mot, quelle que soit sa forme, et d'obtenir des informations morphosyntaxiques dessus. <br>
    Par exemple, en recherchant <b>mangeâmes</b>, on apprend que ce mot est une forme du verbe <i>manger</i>, au passé simple à la première personne du pluriel.
</p>
<h2>Table des codes pour "Catégorie secondaire"</h2>
<p>
    Morfetik retourne une catégorie principale, qui est la catégorie gramaticale générale du verbe, et une catégorie gramaticale secondaire qui précise. Cette table décrit les différents codes:
</p>
<table class="table table-sm table-hover table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Abréviation</th>
            <th>Signification</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>adj</td>
            <td>Adjectif</td>
        </tr>
        <tr>
            <td>adj(f)</td>
            <td>Adjectif(le plus souvent au féminin)</td>
        </tr>
        <tr>
            <td>adj(m)</td>
            <td>Adjectif(le plus souvent au masculin)</td>
        </tr>
        <tr>
            <td>adjf</td>
            <td>Adjectif féminin</td>
        </tr>
        <tr>
            <td>adjfs</td>
            <td>Adjectif féminin singulier</td>
        </tr>
        <tr>
            <td>adjfp</td>
            <td>Adjectif féminin pluriel</td>
        </tr>
        <tr>
            <td>adjm</td>
            <td>Adjectif masculin</td>
        </tr>
        <tr>
            <td>adjms</td>
            <td>Adjectif masculin singulier</td>
        </tr>
        <tr>
            <td>adjmp</td>
            <td>Adjectif masculin pluriel</td>
        </tr>
        <tr>
            <td>adjord</td>
            <td>Adjectif ordinal</td>
        </tr>
        <tr>
            <td>Adv</td>
            <td>Adverbe</td>
        </tr>
        <tr>
            <td>C:Coord</td>
            <td>Conjonction de coordination</td>
        </tr>
        <tr>
            <td>C:Sub</td>
            <td>Conjonction de subordination</td>
        </tr>
        <tr>
            <td>D:Déf</td>
            <td>Déterminant défini</td>
        </tr>
        <tr>
            <td>D:Dém</td>
            <td>Déterminant démonstratif</td>
        </tr>
        <tr>
            <td>D:Excl</td>
            <td>Déterminant exclamatif</td>
        </tr>
        <tr>
            <td>D:Ind</td>
            <td>Déterminant indicatif</td>
        </tr>
        <tr>
            <td>D:Inte</td>
            <td>Déterminant interrogatif</td>
        </tr>
        <tr>
            <td>D:Num</td>
            <td>Déterminant numéral</td>
        </tr>
        <tr>
            <td>D:Part</td>
            <td>Déterminant partitif</td>
        </tr>
        <tr>
            <td>D:Poss</td>
            <td>Déterminant possessif</td>
        </tr>
        <tr>
            <td>D:Rel</td>
            <td>Déterminant relatif</td>
        </tr>
        <tr>
            <td>Interj</td>
            <td>Interjection</td>
        </tr>
        <tr>
            <td>nf</td>
            <td>Nom féminin</td>
        </tr>
        <tr>
            <td>nfp</td>
            <td>Nom féminin pluriel</td>
        </tr>
        <tr>
            <td>nfs</td>
            <td>Nom féminin singulier</td>
        </tr>
        <tr>
            <td>nm</td>
            <td>Nom masculin</td>
        </tr>
        <tr>
            <td>nmp</td>
            <td>Nom masculin pluriel</td>
        </tr>
        <tr>
            <td>nms</td>
            <td>Nom masculin singulier</td>
        </tr>
        <tr>
            <td>P:Dém</td>
            <td>Pronom démonstratif</td>
        </tr>
        <tr>
            <td>P:Ind</td>
            <td>Pronom indicatif</td>
        </tr>
        <tr>
            <td>P:Int</td>
            <td>Pronom interrogatif</td>
        </tr>
        <tr>
            <td>P:Pers</td>
            <td>Pronom personnel</td>
        </tr>
        <tr>
            <td>P:Poss</td>
            <td>Pronom possessif</td>
        </tr>
        <tr>
            <td>P:Rel</td>
            <td>Pronom relatif</td>
        </tr>
        <tr>
            <td>Prép</td>
            <td>Préposition</td>
        </tr>
        <tr>
            <td>Verbe</td>
            <td>Verbe</td>
        </tr>
    </tbody>
</table>