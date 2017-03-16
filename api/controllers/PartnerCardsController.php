<?php
namespace app\controllers;

use app\models\partners\CardProduct;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;

class PartnerCardsController extends CController
{
    public $modelClass = 'app\models\PartnerCards';

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['update'], $actions['create'], $actions['view'], $actions['delete']);

        return $actions;
    }

    public function actionGetPossibilatyFuelByCard($id_electro, $id_product)
    {
        return $this->findCardProduct($id_electro, $id_product);
    }

    private function findCardProduct($id_electro, $id_product)
    {
        $model = CardProduct::findOne(['id_electro' => $id_electro]);

        if (!$model)
            throw new NotFoundHttpException('Card not found');

        $model->setIdProduct($id_product);

        return $model;
    }
}