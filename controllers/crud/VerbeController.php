<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\Verbe;
use app\models\crud\CodesVerbe;
use app\models\crud\VerbeSearch;

class VerbeController extends AbstractController
{
    protected function getModel()
    {
        return new Verbe();
    }
    protected function getRelatedModel()
    {
        return new CodesVerbe();
    }
    protected function getSearch()
    {
        return new VerbeSearch();
    }
    protected function getName()
    {
        return 'Verbe';
    }
}
