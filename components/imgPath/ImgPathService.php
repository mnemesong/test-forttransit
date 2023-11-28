<?php

namespace components\imgPath;

class ImgPathService
{
    public static function getWebDirPath(): string
    {
        $ds = DIRECTORY_SEPARATOR;
        return dirname(__DIR__, 2) . $ds . 'web';
    }

    public function getPostImgsPath(): string
    {
        $ds = DIRECTORY_SEPARATOR;
        return self::getWebDirPath() . $ds . 'post-img';
    }

    public function pathToUrl(string $path): string
    {
        $ds = DIRECTORY_SEPARATOR;
        $relatPath = str_replace(self::getWebDirPath(), '', $path);
        return str_replace($ds, '/', $relatPath);
    }
}