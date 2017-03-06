<?php
namespace app\controllers;

use Yii;

class ProductsController extends CController
{
    public $modelClass = 'app\models\Products';

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['update'], $actions['create'], $actions['view'], $actions['delete']);

        return $actions;
    }

    public function actionIndex()
    {
        $terminal = $this->getTerminal();

        return $terminal->getProducts();
    }
}