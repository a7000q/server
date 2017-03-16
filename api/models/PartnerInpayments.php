<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner_inpayments".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $id_partner
 * @property string $sum
 *
 * @property Partners $idPartner
 */
class PartnerInpayments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_inpayments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_partner'], 'integer'],
            [['sum'], 'number'],
            [['id_partner'], 'exist', 'skipOnError' => true, 'targetClass' => Partners::className(), 'targetAttribute' => ['id_partner' => 'id']],
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
            'id_partner' => 'Id Partner',
            'sum' => 'Sum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartner()
    {
        return $this->hasOne(Partners::className(), ['id' => 'id_partner']);
    }
}
