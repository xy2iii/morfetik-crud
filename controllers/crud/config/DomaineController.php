<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigDomaine;
use app\models\crud\config\ConfigDomaineSearch;

class DomaineController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigDomaine();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigDomaineSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
