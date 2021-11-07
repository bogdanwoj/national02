<?php

class Product extends Base
{
    public $name;

    public $price;

    public $description;

    public $discount;


    public static function getTableName()
    {
        return 'products';
    }

    public function getImages()
    {
        return ProductImage::findBy('productId', $this->getId());
    }

    public function getFirstImage()
    {
        $images =$this->getImages();

        if (isset($images[0])){
            return $images[0];
        } else {
            $image = new ProductImage();
            $image->file = 'no_image.png';
            return $image;
        }
    }


    public function getPrice()
    {
        $intPart = intval($this->price);

        $floatPart = intval(($this->price-$intPart)*100);

        return "$intPart<sup>$floatPart</sup>";
    }

    public function getName()
    {
        return $this->name;
    }

}