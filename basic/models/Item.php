<?php

namespace app\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "Item".
 *
 * @property integer $id
 * @property integer $vendor_id
 * @property string $date
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $url
 * @property string $image_url
 */
class Item extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'date'], 'required'],
            [['vendor_id'], 'integer'],
            [['date'], 'safe'],
            [['price'], 'number'],
            [['name', 'description', 'url', 'image_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor_id' => 'Vendor ID',
            'date' => 'Date',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'url' => 'Url',
            'image_url' => 'Image Url',
        ];
    }

    /**
     * Returns if the item can be ordered based on comparing current date and item date
     */
    public function canBeOrdered()
    {
        return true;
    }


    /* CartPositionInterface */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
