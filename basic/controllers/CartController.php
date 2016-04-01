<?php

namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Item;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CartController implements shopping cart controller.
 */
class CartController extends Controller
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

    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Cart::getItems()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionAjaxAddItem($id)
    {
        $result = array();
        if (Yii::$app->request->isAjax) {
            $itemToAdd = Item::findOne($id);
            if ($itemToAdd) {
                Cart::addItem($itemToAdd);
            } else {
                $result['error'] = "Failed to find item " . $id;
            }
        }

        $result['content'] = array(
            'itemCount' => Cart::getItemCount(),
            'totalPrice' => Cart::getTotalPrice()
        );

        return json_encode($result);
    }

    public function actionAjaxRemoveItem($id)
    {
        $result = array();
        if (Yii::$app->request->isAjax) {
            $itemToAdd = Item::findOne($id);
            if ($itemToAdd) {
                Cart::removeItem($itemToAdd);
            } else {
                $result['error'] = "Failed to find item " . $id;
            }
        } else {
            $result['error'] = "Query is not AJAX";
        }

        $result['content'] = array(
            'itemCount' => Cart::getItemCount(),
            'totalPrice' => Cart::getTotalPrice()
        );

        return json_encode($result);
    }

    public function actionAjaxGetCart()
    {
        $result = array();
        if (Yii::$app->request->isAjax) {
            $result['content'] = array(
                'itemCount' => Cart::getItemCount(),
                'totalPrice' => Cart::getTotalPrice()
            );
        } else {
            $result['error'] = "Query is not AJAX";
        }
        return json_encode($result);
    }
}
