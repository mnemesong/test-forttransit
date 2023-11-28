<?php

namespace app\controllers\console;

use db\seeders\AuthorSeeder;
use yii\console\Controller;

class SeedController extends Controller
{
    public function actionAll(): void
    {
        echo \Yii::$app->seederManager->all();
    }

    public function actionView(): void
    {
        \Yii::$app->seederManager->view();
    }

    public function actionAuthors(): void
    {
        echo "Seeded " . (new AuthorSeeder(['verbal' => true]))->run() . ' records';
    }
}