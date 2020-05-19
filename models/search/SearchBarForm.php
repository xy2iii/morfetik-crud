<?php

namespace app\models\search;

use Yii;
use yii\base\Model;

class SearchBarForm extends Model
{
    public $forme;
    public $accent; // When true, search is accent-sensitive.

    public function rules()
    {
        return [
            [['forme'], 'required'],
            ['accent', 'boolean'],
        ];
    }
}
