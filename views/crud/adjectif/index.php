<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdjectifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adjectifs';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="adjectif-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                [
                    'content' =>
                    Html::a(
                        '<i class="glyphicon glyphicon-plus"></i>',
                        ['create'],
                        ['role' => 'modal-remote', 'title' => 'Nouvel adjectif', 'class' => 'btn btn-default']
                    ) .
                        Html::a(
                            '<i class="glyphicon glyphicon-repeat"></i>',
                            [''],
                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Actualiser']
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
                'heading' => '<i class="glyphicon glyphicon-list"></i> Adjectifs: lemmes',
                'before' => '<em>* Vous pouvez redimensionner la table en prenant les bordures des colonnes.</em>',
                'after' => BulkButtonWidget::widget([
                    'buttons' => Html::a(
                        '<i class="glyphicon glyphicon-trash"></i>&nbsp; Supprimer tous',
                        ["bulk-delete"],
                        [
                            "class" => "btn btn-danger btn-xs",
                            'role' => 'modal-remote-bulk',
                            'data-confirm' => false, 'data-method' => false, // for overide yii data api
                            'data-request-method' => 'post',
                            'data-confirm-title' => 'Êtes-vous sûr?',
                            'data-confirm-message' => 'Êtes-vous sûr de vouloir supprimer cet adjectif?'
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