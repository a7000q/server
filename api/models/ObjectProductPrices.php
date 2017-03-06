<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_product_prices".
 *
 * @property integer $id
 * @property integer $id_object
 * @property integer $id_product
 * @property double $price
 *
 * @property Objects $idObject
 * @property Products $idProduct
 */
class ObjectProductPrices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_product_prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_object', 'id_product'], 'integer'],
            [['price'], 'number'],
            [['id_object'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::className(), 'targetAttribute' => ['id_object' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_object' => 'Id Object',
            'id_product' => 'Id Product',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdObject()
    {
        return $this->hasOne(Objects::className(), ['id' => 'id_object']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'id_product']);
    }

    public function getGPrice()
    {
        if ($this->price)
            return $this->price;

        return $this->product->price;
    }
}
