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

$this->title = 'Administration';
$this->params['breadcrumbs'][0] = $this->title;

CrudAsset::register($this);

?>
<div class="adjectif-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterUrl' => '@web/admin',
            'pjax' => true,
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
                'type' => 'danger',
                'heading' => '<i class="fas fa-briefcase"></i> ' . Yii::t('app', '<b>Administration</b>: gestion des utilisateurs'),
                'before' => '<em>' . Yii::t('app', 'Passwords are shown hashed') . '. ' . Yii::t('app', 'Enter the password directly and it will be encrypted.') . '</em>',
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