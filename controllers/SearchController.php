<?php

namespace app\controllers;

use Ds\Set;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
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

        $origParams = Yii::$app->request->queryParams;
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
            Yii::trace('kore ga ajax desu');
            $response = Yii::$app->getResponse();
            $destination = Url::to(Yii::$app->requestedRoute);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            return $this->renderAjax(
                'index',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                ]
            );
        } else {
            return $this->render(
                'index',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                ]
            );
        }
    }

    public function actionAdvanced()
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

        $origParams = Yii::$app->request->queryParams;
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
            Yii::trace('kore ga ajax desu');
            $response = Yii::$app->getResponse();
            $destination = Url::to(Yii::$app->requestedRoute);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            return $this->renderAjax(
                'advanced',
                [
                    'formModel' => $form,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                ]
            );
        } else {
            return $this->render(
                'advanced',
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

        /* Render the correct view based on the lemme's cat field.
         * Each different Cat is a different way to render, and they are based
         * on different catgram values.
         * See the SQL generators for the "forme" table in extra/.
         */
        $cat = $lemme->cat;
        switch ($cat) {
            case "Adj":
                return $this->adj($lemme);
                break;
            case "Dp":
                return $this->dp($lemme);
                break;
            case "Inv":
                return $this->inv($lemme);
                break;
            case "Nom":
                return $this->nom($lemme);
                break;
            case "Vrb":
                return $this->vrb($lemme);
                break;
        }
    }

    private function adj($lemme)
    {
        $result = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram]);

        // Add each adj form. Manage duplicates with sets. 
        $adj = [];
        foreach (['MS', 'FS', 'MP', 'FP'] as $genre) {
            $adj[$genre] = new Set();
        }
        foreach ($result->each() as $forme) {
            $genre = $forme->genre . $forme->num;
            $adj[$genre]->add($forme->forme);
        }

        return $this->renderPartial('detail-Adj', [
            'lemme' => $lemme,
            'adj' => $adj,
        ]);
    }

    private function dp($lemme)
    {
        $result = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram]);

        // Add each dp form. Manage duplicates with sets. 
        $dp = [];
        foreach (['MS', 'FS', 'MP', 'FP'] as $genre) {
            $dp[$genre] = new Set();
        }
        foreach ($result->each() as $forme) {
            $genre = $forme->genre . $forme->num;
            $dp[$genre]->add($forme->forme);
        }

        return $this->renderPartial('detail-Dp', [
            'lemme' => $lemme,
            'dp' => $dp,
        ]);
    }

    private function inv($lemme)
    {
        $result = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram]);

        // Add each inv form.
        $inv = new Set();
        foreach ($result->each() as $forme) {
            $inv->add($forme->forme);
        }

        return $this->renderPartial('detail-Inv', [
            'lemme' => $lemme,
            'inv' => $inv,
        ]);
    }

    private function nom($lemme)
    {
        $result = Forme::find()
            ->andFilterWhere(['=', 'lemme', $lemme->lemme])
            ->andFilterWhere(['=', 'catgram', $lemme->catgram]);

        // Add each dp form. Manage duplicates with sets. 
        $nom = [];
        foreach (['MS', 'FS', 'MP', 'FP'] as $genre) {
            $nom[$genre] = new Set();
        }
        foreach ($result->each() as $forme) {
            $genre = $forme->genre . $forme->num;
            $nom[$genre]->add($forme->forme);
        }

        return $this->renderPartial('detail-Nom', [
            'lemme' => $lemme,
            'nom' => $nom,
        ]);
    }

    private function vrb($lemme)
    {
        // For performance, recreate the queries directly. These are the same as the $baseQuery.
        // We could clone, but it's -really- slow.
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

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Ind-pr']["$personne"] = new Set();
        }
        foreach ($Ind_pr->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Ind-pr']["$personne"]->add($forme->forme);
        }

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Ind-imp']["$personne"] = new Set();
        }
        foreach ($Ind_imp->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Ind-imp']["$personne"]->add($forme->forme);
        }

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Ind-ps']["$personne"] = new Set();
        }
        foreach ($Ind_ps->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Ind-ps']["$personne"]->add($forme->forme);
        }

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Ind-fut']["$personne"] = new Set();
        }
        foreach ($Ind_fut->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Ind-fut']["$personne"]->add($forme->forme);
        }

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Cond-pr']["$personne"] = new Set();
        }
        foreach ($Cond_pr->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Cond-pr']["$personne"]->add($forme->forme);
        }

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Sub-pr']["$personne"] = new Set();
        }
        foreach ($Sub_pr->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Sub-pr']["$personne"]->add($forme->forme);
        }

        foreach (['1S', '2S', '3S', '1P', '2P', '3P'] as $personne) {
            $vrb['Sub-imp']["$personne"] = new Set();
        }
        foreach ($Sub_imp->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Sub-imp']["$personne"]->add($forme->forme);
        }

        // Only specific personnes for sub-imp.
        foreach (['2S', '1P', '2P'] as $personne) {
            $vrb['Imp-pr']["$personne"] = new Set();
        }
        foreach ($Imp_pr->each() as $forme) {
            $personne = $forme->num . $forme->person;
            $vrb['Imp-pr']["$personne"]->add($forme->forme);
        }

        // For Ppres, there's only one temps.
        $vrb['Ppres'] = new Set();
        foreach ($Ppres->each() as $forme) {
            $vrb['Ppres']->add($forme->forme);
        }

        // Different keys for Pp.
        foreach (['MS', 'FS', 'MP', 'FP'] as $personne) {
            $vrb['Pp']["$personne"] = new Set();
        }
        foreach ($Pp->each() as $forme) {
            $personne = $forme->genre . $forme->person;
            $vrb['Pp']["$personne"]->add($forme->forme);
        }

        return $this->renderPartial('detail-Vrb', [
            'lemme' => $lemme,
            'vrb' => $vrb,
        ]);
    }
}
