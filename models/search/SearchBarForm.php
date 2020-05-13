<?php

namespace app\models\search;

use Yii;
use yii\base\Model;

class SearchBarForm extends Model
{
    public $forme;

    public function rules()
    {
        return [
            [['forme'], 'required'],
        ];
    }
}
