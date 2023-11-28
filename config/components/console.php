<?php
$ds = DIRECTORY_SEPARATOR;
return array_merge(
    require_once __DIR__ . $ds . 'base.php',
    [
        'seederManager' => fn() => new \Pantagruel74\Yii2Seeder\SeederManager([
            'seedersPath' => dirname(__DIR__, 2) . $ds . 'db'
                . $ds . 'seeders',
            'verbal' => true,
        ]),
    ]
);