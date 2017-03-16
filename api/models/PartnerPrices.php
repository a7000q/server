<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner_prices".
 *
 * @property integer $id
 * @property integer $id_partner
 * @property integer $id_product
 * @property string $price
 *
 * @property Partners $idPartner
 * @property Products $idProduct
 */
class PartnerPrices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner', 'id_product'], 'integer'],
            [['price'], 'number'],
            [['id_partner'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner' => 'id']],
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
            'id_partner' => 'Id Partner',
            'id_product' => 'Id Product',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartner()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'id_product']);
    }
}
