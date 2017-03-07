<?php
namespace app\controllers;

use Yii;
use yii\data\ArrayDataProvider;

class ProductsController extends CController
{
    public $modelClass = 'app\models\ObjectProductPrices';

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['update'], $actions['create'], $actions['view'], $actions['delete']);

        return $actions;
    }

    public function actionIndex()
    {
        $terminal = $this->getTerminal();

        return new ArrayDataProvider(['allModels' => $terminal->products]);
    }
}