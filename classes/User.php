<?php

require_once('Shop.php');

class User{

    private $id;

    private $username;

    private $email;

    private $password;
    
    private $roles;

    private $nom;

    private $prenom;

    private $shop_id;

    public function __construct()
    {
        
    }

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
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = json_decode($this->roles);

        return $roles;
    }
    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles(array $roles)
    {
        $this->roles = json_encode($roles);

        return $this;
    }

    public function hasRole($userRole){
        foreach($this->getRoles() as $role){
            if($role === $userRole){
                return true;
            }
        }
        
        
        
        return false;
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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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
    public function setShop($shop)
    {
        if(!is_null($shop)){
            $this->shop_id = $shop->getId();
        }else{
            $this->shop_id = $shop;
        }
        

        return $this;
    }
}