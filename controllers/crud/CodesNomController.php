<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\CodesNom;
use app\models\crud\CodesNomSearch;

class CodesNomController extends AbstractController
{
    protected function getModel()
    {
        return new CodesNom();
    }
    protected function getSearch()
    {
        return new CodesNomSearch();
    }
    protected function getName()
    {
        return 'Code nom';
    }
}
