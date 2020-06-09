<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigAdverbeSouscatgram;
use app\models\crud\config\ConfigAdverbeSouscatgramSearch;
use app\models\crud\AdjectifSearch;

class Adverbe_souscatgramController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigAdverbeSouscatgram();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigAdverbeSouscatgramSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
