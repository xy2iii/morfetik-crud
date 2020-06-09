<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigGramSouscatgram;
use app\models\crud\config\ConfigGramSouscatgramSearch;
use app\models\crud\AdjectifSearch;

class Gram_souscatgramController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigGramSouscatgram();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigGramSouscatgramSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
