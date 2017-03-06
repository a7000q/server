<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ObjectProductPrices[] $objectProductPrices
 * @property Terminals[] $terminals
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectProductPrices()
    {
        return $this->hasMany(ObjectProductPrices::className(), ['id_object' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminals()
    {
        return $this->hasMany(Terminals::className(), ['id_object' => 'id']);
    }
}
