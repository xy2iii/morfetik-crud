<?php

namespace app\views\crud;

use Yii;
use yii\helpers\Url;
use kartik\grid\GridView;

/**
 * Custom helper for abstracting away repetitive tasks when writing GridView templates.
 * This is a custom class for this CRUD.
 */
class GridHelper
{
    /**
     * Returns an checkbox column, for use with Krajee GridView only.
     * @return array An checkbox column.
     */
    static function getCheckboxColumn()
    {
        return [
            'class' => 'kartik\grid\CheckboxColumn',
            'width' => '20px',
        ];
    }
    /**
     * Returns an serial column, for use with Krajee GridView only.
     * @return array An serial column.
     */
    static function getSerialColumn()
    {
        return [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '30px',
        ];
    }
    /**
     * Returns a collapsable column with related information.
     * @return array An expand row column.
     */
    static function getExpandRowColumn()
    {
        return [
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
        ];
    }
    /**
     * Returns an action column, for use with Krajee GridView only.
     * @return array An action column.
     */
    static function getActionColumn()
    {
        return [
            'class' => 'kartik\grid\ActionColumn',
            'width' => '90px',
            'vAlign' => 'middle',
            'dropdown' => false,
            'urlCreator' => function ($action, $model, $key, $index) {
                return Url::to([$action, 'id' => $key]);
            },
            'viewOptions' => ['role' => 'modal-remote', 'title' => Yii::t('app', 'View')],
            'updateOptions' => ['role' => 'modal-remote', 'title' => Yii::t('app', 'Update'), 'data-toggle' => 'tooltip'],
            'deleteOptions' => [
                'role' => 'modal-remote', 'title' => 'Supprimer',
                'data-confirm' => false, 'data-method' => false, // for overide yii data api
                'data-request-method' => 'post',
                'data-toggle' => 'tooltip',
                'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item')
            ],
        ];
    }
}
