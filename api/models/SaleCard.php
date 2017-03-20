<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sale_card".
 *
 * @property integer $id
 * @property integer $id_sale
 * @property integer $id_card
 * @property string $name_card
 * @property integer $id_partner
 * @property string $name_partner
 *
 * @property Sales $idSale
 */
class SaleCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sale', 'id_card', 'id_partner'], 'integer'],
            [['name_card', 'name_partner'], 'string', 'max' => 255],
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
            'id_card' => 'Id Card',
            'name_card' => 'Name Card',
            'id_partner' => 'Id Partner',
            'name_partner' => 'Name Partner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sales::className(), ['id' => 'id_sale']);
    }


}
