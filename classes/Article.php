<?php

class Article extends Base
{
    public $title;

    public $name;

    public $categoryId;

    public $date;

    public $userId;

    public $text;

    public function getCategory()
    {
        return new Category($this->categoryId);
    }


    public function getUsername()
    {
        return User::find($this->userId);
    }


    public function getImages()
    {
        return Image::findBy('articleId', $this->getId());
    }

    public function getFirstImage()
    {
        $images =$this->getImages();

        if (isset($images[0])){
            return $images[0];
        } else {
            $image = new Image();
            $image->file = 'no_image.png';
            return $image;
        }
    }


    public static function getTableName()
    {
        return 'articles';
    }


}

