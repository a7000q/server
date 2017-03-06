<?php

namespace app\controllers;

use app\models\Terminals;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\auth\QueryParamAuth;
use Yii;

class CController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        $behaviors['authenticator']['class'] = QueryParamAuth::className();
        $behaviors['authenticator']['tokenParam'] = 'token';
        return $behaviors;
    }

    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        //print_r(parent::afterAction($action, $result));
        if (is_array($result) and isset($result["status"]))
        {
            $r['data'] = $result;
            $r["status"] = 200;

            if (count($result) != 1)
                $result = $r;
        }
        else if (!isset($result->status))
        {
            if (method_exists($result, 'getModels'))
            {
                $r['data'] = $result->getModels();
            }
            else
                $r['data'] = $result;

            $r["status"] = 200;
            $result = $r;
        }

        return $result;
    }

    /**
     * @return Terminals
     */
    protected function getTerminal()
    {
        return Yii::$app->user->identity;
    }
}