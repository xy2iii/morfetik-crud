<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\CodesVerbe;
use app\models\crud\CodesVerbeSearch;

class CodesVerbeController extends AbstractController
{
    protected function getModel()
    {
        return new CodesVerbe();
    }
    protected function getSearch()
    {
        return new CodesVerbeSearch();
    }
    protected function getName()
    {
        return 'Code verbe';
    }
}
