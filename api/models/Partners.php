<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $name
 * @property string $full_name
 * @property integer $inn
 * @property string $debit
 * @property string $kredit
 * @property integer $limit
 *
 * @property PartnerCards[] $partnerCards
 * @property PartnerInpayments[] $partnerInpayments
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inn', 'limit'], 'integer'],
            [['debit', 'kredit'], 'number'],
            [['name', 'full_name'], 'string', 'max' => 255],
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
            'full_name' => 'Full Name',
            'inn' => 'Inn',
            'debit' => 'Debit',
            'kredit' => 'Kredit',
            'limit' => 'Limit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerCards()
    {
        return $this->hasMany(PartnerCards::className(), ['id_partner' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerInpayments()
    {
        return $this->hasMany(PartnerInpayments::className(), ['id_partner' => 'id']);
    }
}
