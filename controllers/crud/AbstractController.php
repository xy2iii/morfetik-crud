<?php

namespace app\controllers\crud;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use kartik\grid\EditableColumnAction;

/**
 * AbstractController implements the CRUD actions for a model.
 */
abstract class AbstractController extends Controller
{
    /**
     * Returns the associated model.
     * @return object A model object.
     */
    abstract protected function getModel();
    /**
     * Returns the related code model.
     * For instance, if the model is Adjectif,
     *  then the related model is CodesAdjectif.
     * @return object A model object.
     */
    protected function getRelatedModel()
    {
        return false;
    }
    /**
     * Returns the associated search model.
     * @return object A search object.
     */
    abstract protected function getSearch();
    /**
     * Returns the prettified name, for use in views to display to the user.
     * This name should describe a single item, for example:
     *     "Créer un nouvel **Adjectif**"*
     * @return string The pretty name.
     */
    abstract protected function getName();

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'editable' => [
                'class' => EditableColumnAction::className(),
                'modelClass' => $this->getModel()::className(),
            ]
        ]);
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['editor'],
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'expand-row' => ['post'],
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = $this->getSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $relatedModel = $this->getRelatedModel();

        $response = Yii::$app->getResponse();
        $destination = Url::to([Yii::$app->requestedRoute]);
        $response->getHeaders()->set('X-Pjax-Url', $destination);
        $response->getHeaders()->set('Location', $destination);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'relatedModel' => $relatedModel,
        ]);
    }


    /**
     * Displays a single model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = Yii::$app->getResponse();
            $destination = Url::to([Yii::$app->requestedRoute]);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            return [
                'title' => Yii::t('app', '{item} #', ['item' => $this->getName()]) . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                    'id' => $id,
                ]),
                'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                    Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = $this->getModel();
        $relatedModel = $this->getRelatedModel();

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = Yii::$app->getResponse();
            $destination = Url::to([Yii::$app->requestedRoute]);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            if ($request->isGet) {
                return [
                    'title' => Yii::t('app', 'Create new {item}', ['item' => $this->getName()]),
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'relatedModel' => $relatedModel,
                    ]),
                    'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                        Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => Yii::t('app', 'Create new {item}', ['item' => $this->getName()]),
                    'content' => '<span class="text-success">' . Yii::t('app', 'An {item} has been created', ['item' => $this->getName()]) . '</span>',
                    'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                        Html::a(Yii::t('app', 'Create more'), ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => Yii::t('app', 'Create new {item}', ['item' => $this->getName()]),
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'relatedModel' => $relatedModel,
                    ]),
                    'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                        Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $relatedModel = $this->getRelatedModel();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = Yii::$app->getResponse();
            $destination = Url::to([Yii::$app->requestedRoute]);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            if ($request->isGet) {
                return [
                    'title' => Yii::t('app', 'Update {item} #', ['item' => $this->getName()]) . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'relatedModel' => $relatedModel,
                    ]),
                    'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                        Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => Yii::t('app', '{item} #', ['item' => $this->getName()]) . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'relatedModel' => $relatedModel,
                    ]),
                    'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                        Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => Yii::t('app', 'Update {item} #', ['item' => $this->getName()]) . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'relatedModel' => $relatedModel,
                    ]),
                    'footer' => Html::button(Yii::t('app', 'Close'), ['class' => 'btn btn-outline-secondary mr-auto', 'data-dismiss' => "modal"]) .
                        Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'relatedModel' => $relatedModel,
                ]);
            }
        }
    }

    /**
     * Delete an existing model.
     * For ajax request, will return a json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = Yii::$app->getResponse();
            $destination = Url::to([Yii::$app->requestedRoute]);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing model.
     * For ajax request, will return a json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = Yii::$app->getResponse();
            $destination = Url::to([Yii::$app->requestedRoute]);
            $response->getHeaders()->set('X-Pjax-Url', $destination);
            $response->getHeaders()->set('Location', $destination);
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Returns a related model and displays the expand-row view.
     * Used for Ajax requests.
     */
    public function actionExpandRow()
    {
        $request = Yii::$app->request;
        // Check the request for the presence of $expandRowKey.
        $id = $request->post('expandRowKey');

        // Get the model and related model.
        $model = $this->findModel($id);
        $relatedModel = $this->getRelatedModel()::find()
            ->where(['Code' => $model->Flex])
            ->one();

        // Make the base form.
        // Rad represents the numbers of characters to remove to get the base form.
        $remove = - ($relatedModel->Rad);
        if ($remove !== 0) {
            $baseForm = mb_substr($model->Lemme, 0, $remove);
        } else {
            $baseForm = $model->Lemme;
        }

        return $this->renderPartial(
            '_expand-row',
            [
                'model' => $model,
                'relatedModel' => $relatedModel,
                'baseForm' => $baseForm,
            ]
        );
    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Model the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = $this->getModel()::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
