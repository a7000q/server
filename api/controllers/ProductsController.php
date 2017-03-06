<?php
namespace app\controllers;

use yii\rest\ActiveController;

class ProductsController extends ActiveController
{
    public $modelClass = 'app\models\Products';
}