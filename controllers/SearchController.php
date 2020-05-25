<?php

namespace app\controllers;

use Ds\Set;

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

        $lemme = Forme::findOne($id);
        // Make sure the search is strict, no matter what the search mode is.
        $baseQuery = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram]);

        // Render the correct view based on the lemme's cat field.
        // Each different Cat is a different way to render, and they are based
        // on different catgram values.
        // See the SQL generators for the "forme" table in extra/.
        $cat = $lemme->cat;
        switch ($cat) {
            case "Adj":
                return $this->renderPartial('detail-Adj', ['models' => $baseQuery]);
                break;
            case "Dp":
                return $this->renderPartial('detail-Dp', ['models' => $baseQuery]);
                break;
            case "Inv":
                return $this->renderPartial('detail-Inv', ['models' => $baseQuery]);
                break;
            case "Nom":
                return $this->renderPartial('detail-Nom', ['models' => $baseQuery]);
                break;
            case "Vrb":
                return $this->renderForVrb($lemme);
                break;
        }
    }

    private function renderForVrb($lemme)
    {
        // For performance, recreate the queries directly
        // These are the same as the $baseQuery
        // We could clone, but it's -really- slow
        $lemme = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->one();
        $Inf = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Inf']);
        $Ind_pr = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Ind-pr']);
        $Ind_imp = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Ind-imp']);
        $Ind_ps = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Ind-ps']);
        $Ind_fut = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Ind-fut']);
        $Cond_pr = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Cond-pr']);
        $Sub_pr = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Sub-pr']);
        $Sub_imp = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Sub-imp']);
        $Imp_pr = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Imp-pr']);
        $Ppres = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Ppres']);
        $Pp = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram])
            ->andFilterWhere(['temps' => 'Pp']);

        $vrb = [];
        /* For each request, add each temps. We need to manage duplicates, too.
         * Manage it in batch, using each().
         * Each case is different, so we use different for loops.
         * Use sets to resolve duplicates. For example, "breveter" has multiple
         * flexions, and some formes are duplicates, and some are not.
         */

        // For inf, there's only one temps.
        $vrb['Inf'] = new Set();
        foreach ($Inf->each() as $forme) {
            $vrb['Inf']->add($forme->forme);
        }

        // Create sets, to filter out duplicate.
        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Ind-pr']["$personne"] = new Set();
        }
        foreach ($Ind_pr->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Ind-pr']["$personne"]->add($forme->forme);
        }

        // Create the $vrb variable in the view
        $res = [
            'lemme' => $lemme,
            'vrb' => $vrb,
        ];

        return $this->renderPartial('detail-Vrb', $res);
    }
}
