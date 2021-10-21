<?php

class Cart extends Base
{
    public $userId;


    public function getUser()
    {
        return new User($this->userId);
    }


    public function add($productId, $parentId=null)
    {
        if (is_null($parentId)){
            $cartItem = query("SELECT * FROM cart_items WHERE productId=$productId AND cartId={$this->getId()}");
        } else {
            $cartItem = query("SELECT * FROM cart_items WHERE productId=$productId AND parentId=$parentId AND cartId={$this->getId()}");
        }

        if (count($cartItem)>0){

            $cartItem = new CartItem($cartItem[0]['id']);
            $cartItem->quantity =$cartItem->quantity +1;
            $cartItem->save();

        } else {
            $cartItem = new CartItem();
            $cartItem->cartId=$this->getId();
            $cartItem->productId = $productId;
            $cartItem->quantity = 1;
            if (!is_null($parentId)){
                $cartItem->parentId = $parentId;
            }
            $cartItem->save();
        }
    }

    /**
     * @return CartItem[]
     */
    public function getCartItems()
    {
        return CartItem::findBy('cartId', $this->getId());
    }

    public function getTotal()
    {
        $total = 0;

        foreach ($this->getCartItems() as $cartItem){
            $total+=$cartItem->getTotal();
        }

        return $total;
    }

    public function getFinalTotal()
    {
        $total = $this->getTotal();

        if ($total>=1000){
            return $total * 0.95;
        } else {
            return $total;
        }

    }

    public function getProductCount()
    {
        $total = 0;

        foreach ($this->getCartItems() as $cartItem){
            $total+=$cartItem->quantity;
        }

        return $total;
    }

    public function getWeight()
    {
        $totalWeight=0;

        foreach ($this->getCartItems() as $cartItem){
            $totalWeight+=$cartItem->getProduct()->weight;
        }

        return $totalWeight;
    }

    public static function getTableName()
    {
        return 'carts';
    }

}