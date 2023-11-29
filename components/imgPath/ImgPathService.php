<?php

namespace components\imgPath;

use Webmozart\Assert\Assert;

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
        return self::getWebDirPath() . $ds . 'post-imgs';
    }

    public function pathToUrl(string $path): string
    {
        $ds = DIRECTORY_SEPARATOR;
        Assert::notFalse(
            mb_strpos($path, self::getWebDirPath()),
            "Web directory path is not includes in image file-path"
        );
        $relatPath = str_replace(self::getWebDirPath(), '', $path);
        return str_replace($ds, '/', $relatPath);
    }
}