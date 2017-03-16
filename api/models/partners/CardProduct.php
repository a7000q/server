<?php

namespace app\models\partners;

use app\models\ObjectProductPrices;
use app\models\PartnerCards;
use app\models\PartnerPrices;
use app\models\Products;
use yii\helpers\ArrayHelper;

class CardProduct extends PartnerCards
{
    private $id_product;

    public function extraFields()
    {
        return ['maxVolume', 'price', 'partner'];
    }

    public function setIdProduct($id_product)
    {
        $this->id_product = $id_product;
    }

    public function getPartnerPrice()
    {
        return $this->hasOne(PartnerPrices::className(), ['id_partner' => 'id_partner'])->where(['id_product' => $this->id_product]);
    }

    public function getProduct()
    {
        return Products::findOne(['id' => $this->id_product]);
    }

    public function getPrice()
    {
        $price = $this->partnerPrice;

        if ($price)
            return $price->price;

        $price = ObjectProductPrices::findOne(['id_object' => \Yii::$app->user->identity->id_object, 'id_product' => $this->id_product]);

        if ($price)
            return $price->gPrice;

        return ArrayHelper::getValue($this, "product.price");
    }

    public function getFuelBalance()
    {
        $partner = $this->partner;
        $result = $partner->balance + $partner->limit;

        return $result;
    }

    public function getMaxVolume()
    {
        $volume = round($this->fuelBalance/$this->price);

        return $volume;
    }
}