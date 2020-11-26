<?php


require_once('Shop.php');

class Product{

    private $id;

    private $nom;

    private $image;

    private $shop_id;

    private $prix;

    private $details;

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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of shop
     */ 
    public function getShop()
    {
        return $this->shop_id;
    }

    /**
     * Set the value of shop
     *
     * @return  self
     */ 
    public function setShop(Shop $shop)
    {
        $this->shop_id = $shop->getId();

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }
}