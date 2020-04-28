<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\Grammaire;
use app\models\crud\GrammaireSearch;

class GrammaireController extends AbstractController
{
    protected function getModel()
    {
        return new Grammaire();
    }
    protected function getSearch()
    {
        return new GrammaireSearch();
    }
    protected function getName()
    {
        return 'Code verbe';
    }
}
