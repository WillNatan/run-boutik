<?php 
    include_once('../../config/Config.php');
    $config = new Config();
    $db = $config->dbConnect();
    if(isset($_GET['id'])){
        $sql = "DELETE from address WHERE id=:id";
        $q = $db->prepare($sql);
        $q->bindValue(':id',$_GET['id']);
        $q->execute();
        header('Location: ./');
    }
?>