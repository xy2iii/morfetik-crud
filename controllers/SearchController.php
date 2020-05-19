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
        $form = new SearchBarForm();
        $searchModel = new FormeSearch();

        $session = Yii::$app->session;
        $session->open();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            /* The form has been submitted. Save parameters to session,
             * so that they persist even in future searches,
             * for instance with the Ajax grid search. 
             */
            $session->set('lemme', $form->lemme);
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
                    'lemme' => $session->has('lemme') ? $session->get('lemme') : '',
                ],
                'searchParams' => [
                    'accent' => $session->has('accent') ? $session->get('accent') : '0'
                ]
            ],
        );

        // Transfer params to FormeSearch.
        $dataProvider = $searchModel->search($params);

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax(
                'index',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]
            );
        } else {
            return $this->render(
                'index',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]
            );
        }
    }
}
