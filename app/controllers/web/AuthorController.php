<?php

namespace app\controllers\web;

use db\records\AuthorAR;
use yii\rest\ActiveController;
use yii\web\Response;

class AuthorController extends ActiveController
{
    public $modelClass = AuthorAR::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);
        unset($actions['create']);
        unset($actions['update']);
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];
        return $actions;
    }
}