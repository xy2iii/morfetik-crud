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

<div class="row">
    <div class="col-md-10">
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
            ActiveForm::end();
            Pjax::end();
            ?>
        </div>
    </div>

    <div class="col-md-2 d-none d-md-block">
        <div class="btn-group-vertical">
            <button class="btn btn-secondary btn-sm" type="button" data-toggle="modal" data-target="#userGuide" aria-expanded="false" aria-controls="userGuide">
                Guide d'utilisation
            </button>
            <?= Html::a('Recherche avancée', ['search/advanced'], ['class' => 'btn btn-sm btn-outline-secondary', 'data-pjax' => 0]) ?>
        </div>
    </div>
    <div class="d-md-none col">
        <button class="btn btn-secondary btn-sm" type="button" data-toggle="modal" data-target="#userGuide" aria-expanded="false" aria-controls="userGuide">
            Guide d'utilisation
        </button>
        <?= Html::a('Recherche avancée', ['search/advanced'], ['class' => 'btn btn-sm btn-outline-secondary', 'data-pjax' => 0]) ?>
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
                    'header' => 'Resources externes',
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Guide d'utilisation</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Morfetik permet d'obtenir, pour n'importe quel mot français, l'ensemble de ses formes (pluriel des noms, féminin et pluriel des adjectifs, formes conjuguées des verbes, etc.), ou bien, réciproquement, d'identifier le mot (la forme de base, le "lemme") correspondant à n'importe quelle forme fléchie. Par exemple, si l'on saisit la forme avions, on obtient les deux réponses suivantes :
                    <ul>
                        <li>avoir, verbe, imparfait de l'indicatif, 1re personne du pluriel</li>
                        <li>avion, nm, pluriel</li>
                    </ul>
                    Si maintenant on clique sur le mot avoir, on obtient toute sa conjugaison. 
                </p>
                <h2>L'utilisation</h2>
                <p>
                    Commencer par taper la forme à rechercher. Choisir ensuite le mode de recherche :
                    <ul>
                        <li>avec ou sans prise en compte des accents. La prise en compte des accents permet une sélectivité plus grande des formes.</li>
                        <li>stricte (par défaut), c’est-à-dire une recherche exacte du mot tapé ou large, une recherche de tous les mots commençant par le mot tapé.</li>
                    </ul>
                    Cliquer ensuite sur l'un des liens représentant le lemme, une fenêtre contenant le résultat s'affichera
                </p>
                <h2>Réference</h2>
                <h3>Les catégories grammaticales</h3>
                <ul>
                    <li>Adjectif</li>
                    <li>Nom</li>
                    <li>Verbe</li>
                    <li>Adverbe</li>
                    <li>Conjonction</li>
                    <li>Déterminant</li>
                    <li>Pronom</li>
                    <li>Préposition</li>
                    <li>Interjection</li>
                </ul>
                <h3>Les codes des sous-catégories grammaticales</h3>
                <h4>Adjectifs</h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Code</th>
                            <th>Sous-catégorie grammaticale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>adjm</td>
                            <td>Adjectif masculin</td>
                        </tr>
                        <tr>
                            <td>adjf</td>
                            <td>Adjectif féminin</td>
                        </tr>
                        <tr>
                            <td>adj(m)</td>
                            <td>Adjectif généralement masculin (fém. rare)</td>
                        </tr>
                        <tr>
                            <td>adj(f)</td>
                            <td>Adjectif généralement féminin (masc. rare)</td>
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
                            <td>adjfs</td>
                            <td>Adjectif féminin singulier</td>
                        </tr>
                        <tr>
                            <td>adjfp</td>
                            <td>Adjectif féminin pluriel</td>
                        </tr>
                        <tr>
                            <td>adjord</td>
                            <td>Adjectif numéral ordinal</td>
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
                            <td>adj <span class="badge badge-secondary">Locution</span></td>
                            <td>Locution adjectivale</td>
                        </tr>
                    </tbody>
                </table>

                <h4>Déterminants</h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Code</th>
                            <th>Sous-catégorie grammaticale</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            <td>loc <span class="badge badge-secondary">Locution</span></td>
                            <td>Locution</td>
                        </tr>
                        <tr>
                            <td>loc C&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution conjonctive</td>
                        </tr>
                        <tr>
                            <td>loc D&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution déterminative</td>
                        </tr>
                        <tr>
                            <td>loc Interj&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution interjective</td>
                        </tr>
                        <tr>
                            <td>loc P&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution pronominale</td>
                        </tr>
                        <tr>
                            <td>loc Ph&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution-phrase</td>
                        </tr>
                        <tr>
                            <td>loc Prép&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution prépositionnelle</td>
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
                            <td>sig</td>
                            <td>Sigle</td>
                        </tr>
                    </tbody>
                </table>

                <h4>Noms</h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Code</th>
                            <th>Sous-catégorie grammaticale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>nm</td>
                            <td>Nom masculin (flexion)</td>
                        </tr>
                        <tr>
                            <td>nms</td>
                            <td>Nom masculin singulier</td>
                        </tr>
                        <tr>
                            <td>nmp</td>
                            <td>Nom masculin pluriel</td>
                        </tr>
                        <tr>
                            <td>nf</td>
                            <td>Nom féminin (flexion)</td>
                        </tr>
                        <tr>
                            <td>nfs</td>
                            <td>Nom féminin singulier</td>
                        </tr>
                        <tr>
                            <td>nfp</td>
                            <td>Nom féminin pluriel</td>
                        </tr>
                        <tr>
                            <td>np</td>
                            <td>Nom pluriel</td>
                        </tr>
                        <tr>
                            <td>loc n&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution nominale</td>
                        </tr>
                    </tbody>
                </table>

                <h4>Verbes</h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Code</th>
                            <th>Sous-catégorie grammaticale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>vi</td>
                            <td>Verbe intransitif</td>
                        </tr>
                        <tr>
                            <td>vt</td>
                            <td>Nom masculin singulier</td>
                        </tr>
                        <tr>
                            <td>vt (vpr)</td>
                            <td>Nom masculin pluriel</td>
                        </tr>
                        <tr>
                            <td>loc v&nbsp;<span class="badge badge-secondary">Locution</span></td>
                            <td>Locution nominale</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Les temps</h3>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Abréviation</th>
                            <th>Signification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Inf</td>
                            <td>Infinitif</td>
                        </tr>
                        <tr>
                            <td>Ind_p</td>
                            <td>Indicatif présent</td>
                        </tr>
                        <tr>
                            <td>Ind_imp</td>
                            <td>Indicatif imparfait</td>
                        </tr>
                        <tr>
                            <td>Ind_ps</td>
                            <td>Indicatif passé simple</td>
                        </tr>
                        <tr>
                            <td>Ind_fut</td>
                            <td>Indicatif futur</td>
                        </tr>
                        <tr>
                            <td>Cond_pr</td>
                            <td>Conditionnel présent</td>
                        </tr>
                        <tr>
                            <td>Sub_pr</td>
                            <td>Subjonctif présent</td>
                        </tr>
                        <tr>
                            <td>Sub_imp</td>
                            <td>Subjonctif imparfait</td>
                        </tr>
                        <tr>
                            <td>Imp_pr</td>
                            <td>Impératif présent</td>
                        </tr>
                        <tr>
                            <td>Ppres</td>
                            <td>Participe présent</td>
                        </tr>
                        <tr>
                            <td>Pp</td>
                            <td>Participe passé</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-4">
                        <h3>Le nombre</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Abréviation</th>
                                    <th>Signification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>S</td>
                                    <td>Singulier</td>
                                </tr>
                                <tr>
                                    <td>P</td>
                                    <td>Pluriel</td>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <h3>Le genre</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Abréviation</th>
                                    <th>Signification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>M</td>
                                    <td>Masculin</td>
                                </tr>
                                <tr>
                                    <td>F</td>
                                    <td>Féminin</td>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <h3>La personne</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Abréviation</th>
                                    <th>Signification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1<sup>ère</sup> personne</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2<sup>ème</sup> personne</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>3<sup>ème</sup> personne</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>