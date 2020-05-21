<?php

namespace app\config;

use Yii;
use yii\base\Component;

/**
 * Sets the webroot. Modify this file to change config. 
 */
class Aliases extends Component
{
    private $baseURL = '/morfetik';
    public function init()
    {
        Yii::setAlias('@web', YII_ENV_DEV ? '' : $this->baseURL);
    }
}
