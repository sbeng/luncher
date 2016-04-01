<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Item;

/**
 * This is the model for shopping cart page
 *
 */
class Cart extends Model
{
    public function rules()
    {
        return [];
    }

    public static function addItem($item)
    {
        \Yii::$app->cart->put($item, 1);
        return true;
    }

    public static function removeItem($item)
    {
        \Yii::$app->cart->remove($item);
        return true;
    }

    public static function getItemCount()
    {
        return \Yii::$app->cart->getCount();
    }

    public static function getTotalPrice()
    {
        return \Yii::$app->cart->getCost();
    }

    public static function getItems()
    {
        return \Yii::$app->cart->getPositions();
    }

}
