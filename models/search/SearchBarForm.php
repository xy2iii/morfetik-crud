<?php

namespace app\models\search;

use Yii;
use yii\base\Model;

class SearchBarForm extends Model
{
    public $forme;
    public $accent = false; // When true, search is accent-sensitive.
    public $strict = true; // Search only for exact matches.

    public function rules()
    {
        return [
            ['forme', 'default', 'value' => ''],
            [['accent', 'strict'], 'boolean'],
        ];
    }
}
