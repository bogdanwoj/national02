<?php
namespace Classes;

class Image extends Base
{

    public $file;

    public $articleId;


    public static function getTableName()
    {
        return 'images';
    }
}