<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
        $form = new SearchBarForm();
        $searchModel = new FormeSearch();

        $session = Yii::$app->session;
        $session->open();

        // Logic to handle remembering options.
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            /* The form has been submitted. Save parameters to session,
             * so that they persist even in future searches,
             * for instance with the Ajax grid search. 
             */
            $session->set('forme',  $form->forme);
            $session->set('accent', $form->accent);
            $session->set('strict', $form->strict);
        } else {
            /* No form has been submitted.
             * This may be the first visit, where no values have been set,
             * so set the form's default values. To get the default values,
             * we get $form->attribute.
             */
            if (!$session->has($form->forme)) $session->set('forme',  $form->forme);
            if (!$session->has($form->accent)) $session->set('accent',  $form->accent);
            if (!$session->has($form->strict)) $session->set('strict',  $form->strict);
        }
        Yii::trace($session->get('accent'));
        Yii::trace($session->get('strict'));

        // Did GridView search for a forme? If so, set it in the session.
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
                        'forme' => $session->get('forme'),
                    ]
                ),
                'searchParams' => [
                    'accent' => $session->get('accent'),
                    'strict' => $session->get('strict'),
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
    /**
     * Returns a related model and displays the expand-row view.
     * Used for Ajax requests.
     */
    public function actionExpandRow()
    {
        $request = Yii::$app->request;
        // expandRowKey is the model ID, supplied by Krajee GridView.
        $id = $request->post('expandRowKey');

        $lemme = Forme::findOne($id)->lemme;
        $formes = Forme::find()->where(['lemme' => $lemme])->all();

        return $this->renderPartial('_expand-row', ['models' => $formes]);
    }
}
