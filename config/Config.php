
<?php

class Config{

    function dbConnect(){
        $conn = new PDO("mysql:host=127.0.0.1;dbname=runboutik","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        return $conn;
    }

}