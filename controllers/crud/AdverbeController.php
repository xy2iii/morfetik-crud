<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\Adverbe;
use app\models\crud\AdverbeSearch;

class AdverbeController extends AbstractController
{
    protected function getModel()
    {
        return new Adverbe();
    }
    protected function getSearch()
    {
        return new AdverbeSearch();
    }
    protected function getName()
    {
        return 'Adverbe';
    }
}
