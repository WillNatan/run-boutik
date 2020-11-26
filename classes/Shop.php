<?php

class Shop
{
    private $id;

    private $nom;

    private $image;

    private $tel;

    private $email;

    private $desc_courte;

    private $is_online;
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
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of desc_courte
     */ 
    public function getDesc()
    {
        return $this->desc_courte;
    }

    /**
     * Set the value of desc_courte
     *
     * @return  self
     */ 
    public function setDesc($desc_courte)
    {
        $this->desc_courte = $desc_courte;

        return $this;
    }

    /**
     * Get the value of is_online
     */ 
    public function getIs_online()
    {
        return $this->is_online;
    }

    /**
     * Set the value of is_online
     *
     * @return  self
     */ 
    public function setIs_online($is_online)
    {
        $this->is_online = $is_online;

        return $this;
    }
}
