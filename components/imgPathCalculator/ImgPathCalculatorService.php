<?php

namespace components\imgPathCalculator;

class ImgPathCalculatorService
{
    protected static function getWebDirPath(): string
    {
        $ds = DIRECTORY_SEPARATOR;
        return dirname(__DIR__, 2) . $ds . 'web';
    }

    public function pathToUrl(string $path): string
    {
        $ds = DIRECTORY_SEPARATOR;
        $relatPath = str_replace(self::getWebDirPath(), '', $path);
        return str_replace($ds, '/', $relatPath);
    }
}