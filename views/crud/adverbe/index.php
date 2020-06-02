<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use app\assets\CrudAsset;
use app\widgets\crud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdjectifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adjectifs';
$this->params['breadcrumbs'][0] =
    [
        'label' => 'Edition',
        'url' => ['site/edit-dashboard'],
    ];
$this->params['breadcrumbs'][1] = $this->title;

CrudAsset::register($this);

?>
<div class="adjectif-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterUrl' => '@web/crud/adverbe',
            'pjax' => true,
            'pjaxSettings' => ['options' => ['enablePushState' => false]],
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                [
                    'content' =>
                    Html::a(
                        '<i class="fas fa-plus"></i>',
                        ['create'],
                        ['role' => 'modal-remote', 'title' => Yii::t('app', 'New'), 'class' => 'btn btn-outline-secondary']
                    ) .
                        Html::a(
                            '<i class="fas fa-redo"></i>',
                            [''],
                            ['data-pjax' => 1, 'class' => 'btn btn-outline-secondary', 'title' => Yii::t('app', 'Reset Grid')]
                        ) .
                        '{toggleData}' .
                        '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="fas fa-list"></i> ' . Yii::t('app', 'Adverbes: lemmes'),
                'before' => '<em>' . Yii::t('app', '* Resize table columns just like a spreadsheet by dragging the column edges') . '.</em>',
                'after' => BulkButtonWidget::widget([
                    'buttons' => Html::a(
                        '<i class="fas fa-trash"></i>&nbsp; ' . Yii::t('app', 'Delete all'),
                        ["bulk-delete"],
                        [
                            "class" => "btn btn-danger btn-xs",
                            'role' => 'modal-remote-bulk',
                            'data-confirm' => false, 'data-method' => false, // for overide yii data api
                            'data-request-method' => 'post',
                            'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                            'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item')
                        ]
                    ),
                ]) .
                    '<div class="clearfix"></div>',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>