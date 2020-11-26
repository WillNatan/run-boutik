<?php
session_start();
require_once('../classes/User.php');
require_once('../classes/Shop.php');
require_once('../config/Config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conf = new Config();
    $db = $conf->dbConnect();
    $user = new User();
    if ($_POST['password'] === $_POST['password_repeat']) {
        function dismount($object)
        {
            $reflectionClass = new ReflectionClass(get_class($object));
            $array = array();
            foreach ($reflectionClass->getProperties() as $property) {
                $property->setAccessible(true);
                $array[$property->getName()] = $property->getValue($object);
                $property->setAccessible(false);
            }
            return $array;
        }
        $chkEmailSql = "SELECT email FROM user WHERE email = :email";
        $req = $db->prepare($chkEmailSql);
        $req->bindValue(':email', htmlspecialchars($_POST['email']));
        $req->execute();
        $res = $req->fetch();
        if(!$res){
            $user->setId(NULL);
            $user->setUsername(htmlspecialchars($_POST['username']));
            $user->setEmail(htmlspecialchars($_POST['email']));
            $user->setPassword(password_hash(htmlspecialchars($_POST['password']), PASSWORD_ARGON2I));
            $user->setNom(htmlspecialchars($_POST['nom']));
            $user->setPrenom(htmlspecialchars($_POST['prenom']));
            $user->setRoles(['ROLE_USER','ROLE_ADMIN']);
            $shop = new Shop();
            $shop->setNom(htmlspecialchars($_POST['shopname']))
                 ->setTel('')
                 ->setEmail('')
                 ->setDesc('')
                 ->setImage('')
                 ->setIs_online(0)
                 ->setId(NULL);
            $shopSql = $db->prepare("INSERT INTO shop (id, nom, email, image, tel, desc_courte, is_online) VALUES (:id, :nom, :email, :image, :tel, :desc_courte, :is_online)");
            $shopSql->execute(dismount($shop));
            $shop->setId($db->lastInsertId());
            $user->setShop($shop);
            $sql = $db->prepare("INSERT INTO user (id,nom,prenom,email,password,username, roles, shop_id) VALUES (:id,:nom,:prenom,:email,:password,:username, :roles, :shop_id)");
            $sql->execute(dismount($user));
            
            header('Location: ../connexion.php');   
        }else{
            $_SESSION['emailExist'] = "Cette adresse email est déjà utilisée !";
            header('Location: ../inscription.php');
        }
    } else {
        $_SESSION['passMatch'] = "Les mots de passes ne correspondent pas !";
        header('Location: ../inscription.php');
    }
}
