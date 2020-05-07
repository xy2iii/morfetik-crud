<?php

namespace app\controllers\crud;

use app\controllers\crud\AbstractController;
use app\models\crud\CodesAdjectif;
use app\models\crud\Adjectif;
use app\models\crud\AdjectifSearch;

class AdjectifController extends AbstractController
{
    protected function getModel()
    {
        return new Adjectif();
    }
    protected function getRelatedModel()
    {
        return new CodesAdjectif();
    }
    protected function getSearch()
    {
        return new AdjectifSearch();
    }
    protected function getName()
    {
        return 'Adjectif';
    }
}
