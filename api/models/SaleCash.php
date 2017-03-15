<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sale_cash".
 *
 * @property integer $id
 * @property integer $id_sale
 * @property integer $bill_sum
 *
 * @property Sales $idSale
 */
class SaleCash extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_cash';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sale', 'bill_sum'], 'integer'],
            [['id_sale'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::className(), 'targetAttribute' => ['id_sale' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sale' => 'Id Sale',
            'bill_sum' => 'Bill Sum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSale()
    {
        return $this->hasOne(Sales::className(), ['id' => 'id_sale']);
    }
}
