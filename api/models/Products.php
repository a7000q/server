<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 *
 * @property ObjectProductPrices[] $objectProductPrices
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectProductPrices()
    {
        return $this->hasMany(ObjectProductPrices::className(), ['id_product' => 'id']);
    }


}
