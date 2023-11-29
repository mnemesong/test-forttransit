<?php

namespace app\controllers\web;

use db\records\PostCategoryAR;
use yii\rest\ActiveController;

class CategoryController extends ActiveController
{
    public $modelClass = PostCategoryAR::class;

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