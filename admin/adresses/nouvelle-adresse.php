<?php
$ROOT = '../../';
include_once($ROOT . 'classes/User.php');
include_once($ROOT . 'classes/Shop.php');
include_once($ROOT . 'classes/Address.php');
include_once($ROOT . 'layout/back/header.php');
$user = $_SESSION['user'];
if (is_null($user->getShop())) {
    header('Location:' . $ROOT . 'admin/boutique/creation.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $config = new Config();
    $db = $config->dbConnect();

    $query = "SELECT * FROM shop WHERE id=:id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $user->getShop());
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, Shop::class);
    $shop = $stmt->fetch();

    if (!empty(htmlspecialchars($_POST['address']))) {
        $address = new Address();

        $address->setId(NULL)
            ->setAddress(htmlspecialchars($_POST['address']))
            ->setShop($shop);

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

        $sql = $db->prepare("INSERT INTO address (id, address, shop_id) VALUES (:id, :address, :shop_id)");
        $sql->execute(dismount($address));
        header('Location: ./');
    } else {
        $_SESSION['emptyAddress'] = "Le champ est vide !";
        header('Location: ./nouvelle-adresse.php');
    }
}
var_dump($_SESSION);
?>
<h4>Nouvelle adresse</h4>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <div class="dash-header">
                    <h5 class="text-center">Ajout d'une adresse</h5>
                </div>
                <div class="dash-body ">
                    <div class="row w-100">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">Entrez le nom de l'adresse</label>
                                    <?php if (isset($_SESSION['emptyAddress'])) { ?>
                                        <span class="text-danger"><?php echo '<br>'.$_SESSION['emptyAddress']; ?></span>
                                    <?php } 
                                    unset($_SESSION['test']);
                                     ?>
                                    <input type="text" class="form-control" required name="address" placeholder="Adresse">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-runb-primary">Ajouter</button>
                                    <a href="./" class="btn-runb-primary">Retour</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    include_once($ROOT . 'layout/back/footer.php') ?>