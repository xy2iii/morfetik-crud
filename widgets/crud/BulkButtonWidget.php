<?php

namespace app\widgets\crud;

use Yii;
use yii\base\Widget;

class BulkButtonWidget extends Widget
{

    public $buttons;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $content = '<div class="pull-left">' .
            '<span class="fas fa-arrow-right"></span>&nbsp;&nbsp;' . Yii::t('app', 'With selected') . '&nbsp;&nbsp;' .
            $this->buttons .
            '</div>';
        return $content;
    }
}
