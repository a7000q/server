<?php
namespace app\controllers;

use app\models\Sales;
use Yii;
use yii\data\ArrayDataProvider;

class SaleController extends CController
{
    public $modelClass = 'app\models\Sales';

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['update'], $actions['create'], $actions['view'], $actions['delete']);

        return $actions;
    }

    public function actionAddCash($date, $id_product, $volume, $price, $bill_sum)
    {
        $terminal = $this->getTerminal();
        $sale = new Sales([
            'date' => $date,
            'id_object' => $terminal->id_object,
            'id_product' => $id_product,
            'id_pay' => 1,
            'volume' => $volume,
            'price' => $price
        ]);

        $sale->save();

        $sale->addSalesCash($bill_sum);

        return $sale;
    }
}