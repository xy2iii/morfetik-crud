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

        if (!YII_ENV_DEV) {
            Yii::setAlias('@web', $this->baseURL);
        }
    }
}
