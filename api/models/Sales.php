<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $id_object
 * @property integer $id_product
 * @property integer $id_pay
 * @property double $volume
 * @property double $price
 *
 * @property SaleCash[] $saleCashes
 * @property Objects $idObject
 * @property Products $idProduct
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_object', 'id_product', 'id_pay'], 'integer'],
            [['volume', 'price'], 'number'],
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
            'date' => 'Date',
            'id_object' => 'Id Object',
            'id_product' => 'Id Product',
            'id_pay' => 'Id Pay',
            'volume' => 'Volume',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleCashes()
    {
        return $this->hasMany(SaleCash::className(), ['id_sale' => 'id']);
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

    public function addSalesCash($sum)
    {
        if (!$this->id)
            return false;

        $cash = new SaleCash([
            'id_sale' => $this->id,
            'bill_sum' => $sum
        ]);

        $cash->save();
    }

    public function addSalesCard($id_card)
    {
        if (!$this->id)
            return false;

        $card = PartnerCards::findOne($id_card);

        if (!$card)
            return false;

        $sale_card = new SaleCard([
            'id_sale' => $this->id,
            'id_card' => $id_card,
            'name_card' => $card->name,
            'id_partner' => $card->id_partner,
            'name_partner' => $card->partner->name
        ]);

        $sale_card->save();
    }

    static public function addSaleCash($date, $id_object, $id_product, $volume, $price, $bill_sum)
    {
        $sale = Sales::find()->where(['date' => $date])
            ->andWhere(['id_object' => $id_object])
            ->andWhere(['id_product' => $id_product])
            ->andWhere(['volume' => $volume])
            ->one();

        if ($sale)
            return $sale;

        $sale = new Sales([
            'date' => $date,
            'id_object' => $id_object,
            'id_product' => $id_product,
            'id_pay' => 1,
            'volume' => $volume,
            'price' => $price
        ]);

        $sale->save();

        $sale->addSalesCash($bill_sum);

        return $sale;
    }

    static public function addSaleCard($date, $id_object, $id_product, $volume, $price, $id_card)
    {
        $sale = Sales::find()->where(['date' => $date])
            ->andWhere(['id_object' => $id_object])
            ->andWhere(['id_product' => $id_product])
            ->andWhere(['volume' => $volume])
            ->one();

        if ($sale)
            return $sale;

        $sale = new Sales([
            'date' => $date,
            'id_object' => $id_object,
            'id_product' => $id_product,
            'id_pay' => 2,
            'volume' => $volume,
            'price' => $price
        ]);

        $sale->save();

        $sale->addSalesCard($id_card);

        return $sale;
    }
}
