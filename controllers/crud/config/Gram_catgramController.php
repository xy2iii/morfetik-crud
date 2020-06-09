<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigGramCatgram;
use app\models\crud\config\ConfigGramCatgramSearch;
use app\models\crud\AdjectifSearch;

class Gram_catgramController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigGramCatgram();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigGramCatgramSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
