<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\search\Forme;
use app\models\search\FormeSearch;
use app\models\search\SearchBarForm;

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
                    'entry-confirm',
                    [
                        'formData' => $form,
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel
                    ]
                );
            } else {
                return $this->render(
                    'entry-confirm',
                    [
                        'formData' => $form,
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel
                    ]
                );
            }
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $form]);
        }
    }
}
