<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\Nom;
use app\models\crud\CodesNom;
use app\models\crud\NomSearch;

class NomController extends AbstractController
{
    protected function getModel()
    {
        return new Nom();
    }
    protected function getRelatedModel()
    {
        return new CodesNom();
    }
    protected function getSearch()
    {
        return new NomSearch();
    }
    protected function getName()
    {
        return 'Nom';
    }
}
