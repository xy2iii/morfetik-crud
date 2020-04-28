<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\CodesAdjectif;
use app\models\crud\CodesAdjectifSearch;

class CodesAdjectifController extends AbstractController
{
    protected function getModel()
    {
        return new CodesAdjectif();
    }
    protected function getSearch()
    {
        return new CodesAdjectifSearch();
    }
    protected function getName()
    {
        return 'Code adjectif';
    }
}
