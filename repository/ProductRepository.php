<?php
require_once(__DIR__ . '/../classes/Product.php');
require_once(__DIR__.'/../config/Config.php');

class ProductRepository
{
    private $db;

    public function __construct()
    {
        $config = new Config();

        $this->db = $config->dbConnect();
    }


    public function findAll()
    {
        $q = $this->db->prepare("SELECT * FROM product");

        $q->execute();
        $q->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $q->fetchAll();
    }

    public function findBy($fields)
    {
        $i = 0;
        $len = count($fields);
        $clause = '';
        foreach ($fields as $field => $value) {
            $clause .= $field . '=' . $value;
            if ($i == 0 && $len !== 1) {
                $clause .=' AND ';
            } else if ($i == $len - 1) {
                
            }
            $i++;
        };
        
        $q = $this->db->prepare("SELECT * FROM product WHERE ".$clause);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $q->fetchAll();
    }

    public function findOneBy($fields)
    {
        $i = 0;
        $len = count($fields);
        $clause = '';
        foreach ($fields as $field => $value) {
            $clause .= $field . '=' . $value;
            if ($i == 0 && $len !== 1) {
                $clause .=' AND ';
            } else if ($i == $len - 1) {
                
            }
            $i++;
        };
        
        $q = $this->db->prepare("SELECT * FROM product WHERE ".$clause);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $q->fetch();
    }

    public function find($id){
        $q = $this->db->prepare("SELECT * FROM product WHERE id=".$id);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $q->fetch();
    }
}
