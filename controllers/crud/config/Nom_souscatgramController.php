<?php

namespace app\controllers\crud\config;

use app\controllers\crud\AbstractController;
use app\models\crud\config\ConfigNomSouscatgram;
use app\models\crud\config\ConfigNomSouscatgramSearch;
use app\models\crud\AdjectifSearch;

class Nom_souscatgramController extends AbstractController
{
    protected function getModel()
    {
        return new ConfigNomSouscatgram();
    }
    protected function getRelatedModel()
    {
        return false;
    }
    protected function getSearch()
    {
        return new ConfigNomSouscatgramSearch();
    }
    protected function getName()
    {
        return 'Configuration';
    }
}
