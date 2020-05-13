<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
/* 
@var formData: app\models\search\SearchBarForm
@var model: app\models\search\Forme
@var dataProvider: app\models\search\FormeSearch
*/

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
]
?>
<p>You have entered the following information:</p>

<ul>
</ul>
<?php
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