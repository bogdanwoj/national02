<?php

class Product extends Base
{
    const TYPE_SERVICE='service';

    const TYPE_DELIVERY='delivery';

    const TYPE_PRODUCT='product';

    const STATUS_ACTIVE=1;

    const STATUS_INACTIVE=0;

    public $name;

    public $price;

    public $description;

    public $code;

    public $discount;

    public $weight;

    public $type;

    public $categoryId;

    public $vendorId;

    public $status;



    public function getCategory()
    {
        return new Category($this->categoryId);
    }

    public function getVendor()
    {
        return new Vendor($this->vendorId);
    }

    public function getPrice()
    {
        $intPart = intval($this->price);

        $floatPart = intval(($this->price-$intPart)*100);

        return "$intPart<sup>$floatPart</sup>";
    }

    public function getFinalPrice()
    {
        $price = $this->price - $this->price*$this->discount/100;

        if ($this->categoryId == 1){
            $price = $price *0.8;
        }

        return $price;
    }

    public function getImages()
    {
        return Image::findBy('productId', $this->getId());
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

    public function getExtraWarranties(){

        if ($this->type!='product'){
            return [];
        }
        $data = query("SELECT * FROM products WHERE type='".static::TYPE_SERVICE."';");
        $ewProducts = [];

        foreach ($data as $item){
            $product = new ProductEW($item['id']);
            $product->parentProduct = $this;
            $ewProducts[]=$product;
        }
        return $ewProducts;
    }


    public function card()
    {
        $productHtml= '<div class="col-3">
            <div class="card  px-4  pt-2" >
                <a href="product.php?id='.$this->getId().'"><img class="card-img-top" src="images/'.$this->getFirstImage()->file.'" alt="'.$this->name.'"></a>
                <div class="card-body text-center">
                    <h5 class="card-title">'.$this->name.'</h5>
                    <p><a href="vendor.php?id='.$this->vendorId.'">'.$this->getVendor()->name.'('.count($this->getVendor()->getProducts()).')</a></p>
                    <h6>
                        <s>'.$this->getPrice().' <span>Lei</span></s>
                        <span class="product-this-deal">(-'.$this->discount.'%)</span>
                    </h6>
                    <h3>'.$this->getFinalPrice().' <span>Lei</span></h3>';

        foreach ($this->getExtraWarranties() as $extraWarranty){
            $productHtml.='<a href="addToCart.php?id='.$extraWarranty->getId().'&parentId='.$this->getId().'" class="btn btn-primary">+ '.$extraWarranty->name.'('.$extraWarranty->getFinalPrice().' RON)</a>';
        }

        $productHtml.='<a href="addToCart.php?id='.$this->getId().'" class="btn btn-primary">Adauga in cos</a>
                    <a href="updateProduct.php?id='.$this->getId().'" class="btn btn-success">Edit</a>
                    <a href="deleteProduct.php?id='.$this->getId().'" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>';

        echo $productHtml;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    public static function getTableName()
    {
        return 'products';
    }
}
