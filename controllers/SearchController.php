<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\search\Forme;
use app\models\search\FormeSearch;
use app\models\search\SearchBarForm;

/**
 * The controller for the main search function.
 * Manages the search bar and displaying results.
 */
class SearchController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['model' => new Forme(), 'searchProvider' => new FormeSearch()]);
    }
    public function actionEntry()
    {
        $form = new SearchBarForm();
        $searchModel = new FormeSearch();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            // Since the form is valid, search
            $dataProvider = $searchModel->search($form);

            if (Yii::$app->request->isAjax) {
                return $this->renderAjax(
                    'entry',
                    [
                        'formModel' => $form,
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel
                    ]
                );
            } else {
                return $this->render(
                    'entry',
                    [
                        'formModel' => $form,
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel
                    ]
                );
            }
        } else {
            /* This is the initial request. 
             * For Ajax rendering reasons, all subsequent renders must use the same view.
             * Thus, render the entry view, even though there is no search data initially. */

            // To do so, create a dataProvider which is guantreed to have no results.
            $dataProvider = $searchModel->search($form);
            return $this->render(
                'entry',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel
                ]
            );
        }
    }
}
