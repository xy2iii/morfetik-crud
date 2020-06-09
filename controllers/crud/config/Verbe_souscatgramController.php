<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigVerbeSouscatgram;
use app\models\crud\config\ConfigVerbeSouscatgramSearch;
use app\models\crud\AdjectifSearch;

class Verbe_souscatgramController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigVerbeSouscatgram();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigVerbeSouscatgramSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
