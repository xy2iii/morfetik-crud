<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigAdjectifSouscatgram;
use app\models\crud\config\ConfigAdjectifSouscatgramSearch;
use app\models\crud\AdjectifSearch;

class Adjectif_souscatgramController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigAdjectifSouscatgram();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigAdjectifSouscatgramSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
