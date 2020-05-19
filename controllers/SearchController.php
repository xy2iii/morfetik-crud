<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\search\Forme;
use app\models\search\FormeSearch;
use app\models\search\FormeSearchByForme;
use app\models\search\SearchBarForm;
use yii\data\ArrayDataProvider;

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

        $session = Yii::$app->session;
        $session->open();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            /* The form has been submitted. Save parameters to session,
             * so that they persist even in future searches,
             * for instance with the Ajax grid search. 
             */
            $session->set('forme', $form->forme);
            $session->set('accent', $form->accent);
        }

        /* Check if the session parameters are set.
         * If they aren't, use default parameters.
         * Note that these are HTML parameters: the default values will be strings.
         */
        $params = array_merge(
            Yii::$app->request->queryParams,
            [
                'FormeSearch' => [
                    'forme' => $session->has('forme') ? $session->get('forme') : '',
                ],
                'searchParams' => [
                    'accent' => $session->has('forme') ? $session->get('forme') : '0'
                ]
            ],
        );

        // Transfer params to FormeSearch.
        $dataProvider = $searchModel->search($params);

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax(
                'entry',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]
            );
        } else {
            return $this->render(
                'entry',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]
            );
        }
    }
}
