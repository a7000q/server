<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner_cards".
 *
 * @property integer $id
 * @property integer $id_partner
 * @property string $id_electro
 * @property string $name
 * @property integer $id_txt
 *
 * @property Partners $idPartner
 */
class PartnerCards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_partner', 'id_txt'], 'integer'],
            [['id_electro', 'name'], 'string', 'max' => 255],
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
            'id_partner' => 'Id Partner',
            'id_electro' => 'Id Electro',
            'name' => 'Name',
            'id_txt' => 'Id Txt',
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
