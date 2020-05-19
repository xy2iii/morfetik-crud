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
            $session->set('forme', $form->forme);
            $session->set('accent', $form->accent);
        }

        // Did GridView search for a forme? If so, set it in the session.
        // We do this after the form, so that the grid view search takes priority.
        $origParams = Yii::$app->request->queryParams;
        if (isset($origParams['FormeSearch']['forme'])) {
            $session->set('forme', $origParams['FormeSearch']['forme']);
        }

        /* Check if the session parameters are set.
         * If they aren't, use default parameters.
         */
        $params = array_merge(
            $origParams,
            [
                'FormeSearch' => array_merge(
                    array_key_exists('FormeSearch', $origParams)
                        ? $origParams['FormeSearch']
                        : [],
                    [
                        'forme' => $session->has('forme') ? $session->get('forme') : '',
                    ]
                ),
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
