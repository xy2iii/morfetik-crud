<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\web\View;
use yii\widgets\Pjax;
use kartik\grid\GridView;

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
)
?>

<?php Pjax::begin();
$form = ActiveForm::begin(
    [
        'action' => Url::toRoute('search/entry'),
        'options' => [
            'class' => 'ajax-submit',
        ],
    ]
);
echo $form->field($formModel, 'forme', [
    'inputTemplate' => '<div class="input-group">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
        </div>
        {input}
        <div class="input-group-append">
            <button class="btn btn-outline-primary">Rechercher</button>
        </div>
    </div>
</div>',
    'enableLabel' => false
]);
ActiveForm::end();
Pjax::end();
?>
<div id="container-pjax">
    <?php
    $columns = [
        [
            'attribute' => 'lemme',
            'vAlign' => 'middle',
        ],
        [
            'attribute' => 'forme',
            'vAlign' => 'middle',
        ],
        [
            'attribute' => 'primaryCategoryLabel',
            'vAlign' => 'middle',
        ],
        // Secondary
        [
            'attribute' => 'catgram',
            'vAlign' => 'middle',
        ],
    ];
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    ?>
</div>