<?php

namespace app\controllers\console;

use db\seeders\AbstractSeeder;
use db\seeders\AuthorSeeder;
use db\seeders\PostCategorySeeder;
use db\seeders\PostInPostCategorySeeder;
use db\seeders\PostSeeder;
use yii\console\Controller;

class SeedController extends Controller
{
    /* @return string[] */
    protected static function allSeeders(): array
    {
        return [
            AuthorSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            PostInPostCategorySeeder::class,
        ];
    }

    public function actionAll($opt = null): void
    {
        $verbal = $opt === 'verbal';
        echo "Start seeders\n";
        if ($verbal) echo "verbal: true";
        foreach (self::allSeeders() as $seederClassName)
        {
            $seeder = new $seederClassName(['verbal' => $verbal]);
            $n = $seeder->run();
            echo $seederClassName . " seed " . $n . " records\n";
        }
    }


    public function actionAuthors(): void
    {
        echo "Seeded " . (new AuthorSeeder(['verbal' => true]))->run() . ' records';
    }
}