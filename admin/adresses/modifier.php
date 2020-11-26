<?php
$ROOT = '../../';
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/AddressRepository.php');
$addressRepository = new AddressRepository();
$address = $addressRepository->find($_GET['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $address->setAddress(htmlspecialchars($_POST['address']));
    $config = new Config();
    $db = $config->dbConnect();
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

    $sql = $db->prepare("UPDATE address SET shop_id =:shop_id, address = :address WHERE id=:id");
    $sql->execute(dismount($address));
    header('Location: ./');
}
?>
<h4>Modification adresse</h4>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="dash-card">
                <div class="dash-header">
                    <h5 class="text-center">Modifier une adresse</h5>
                </div>
                <div class="dash-body">
                    <div class="row w-100">
                        <div class="col-md-12">
                        <form action="" method="POST" class="w-100">
                        <div class="form-group w-100">
                            <label for="">Entrez le nom de l'adresse</label>
                            <input type="text" class="form-control w-100" name="address" required placeholder="Adresse" value="<?php echo $address->getAddress()?>">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn-runb-primary">Modifier</button>
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