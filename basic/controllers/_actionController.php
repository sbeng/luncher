<?php

namespace app\controllers;

use Yii;

/**
 * CartController implements shopping cart controller.
 */
class _ActionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionAddItemList()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Cart::getItems()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}
