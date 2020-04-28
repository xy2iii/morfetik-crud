<?php

namespace app\views\crud;

use Yii;
use yii\helpers\Url;

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
     * Returns an action column, for use with Krajee GridView only.
     * @return array An action column.
     */
    static function getActionColumn()
    {
        return [
            'class' => 'kartik\grid\ActionColumn',
            'width' => '80px',
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
