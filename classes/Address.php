<?php 

require_once('Shop.php');

class Address {
    
    private $id;

    private $address;

    private $shop_id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of shop_id
     */ 
    public function getShop()
    {
        return $this->shop_id;
    }

    /**
     * Set the value of shop_id
     *
     * @return  self
     */ 
    public function setShop(Shop $shop)
    {
        $this->shop_id = $shop->getId();

        return $this;
    }
}