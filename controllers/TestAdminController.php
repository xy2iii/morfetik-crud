<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * An administrative interface to manage users.
 */
class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['updatePost'],
                    ]
                ]
            ],
        ];
    }

    /**
     * Displays the admin panel, to add users.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = User::
        return $this->render('index', ['model' => $model]);
    }
}
