<?php

namespace app\controllers\web;

use db\records\PostAR;
use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = PostAR::class;

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