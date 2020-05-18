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
        // The initial search is a search by Forme.
        $searchModel = new FormeSearch();

        // The form has been submitted. Save it to session.
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $params = array_merge(
                Yii::$app->request->queryParams,
                ['FormeSearch' => ['lemme' => $form->forme]],
            );
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
        } else {
            // No form was submitted. This may be a gridView request.
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
