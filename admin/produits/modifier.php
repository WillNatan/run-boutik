<?php
$ROOT = '../../';
include_once($ROOT . 'classes/Product.php');
include_once($ROOT . 'layout/back/header.php');
include_once($ROOT . 'repository/ProductRepository.php');
include_once($ROOT . 'repository/ShopRepository.php');
$user = $_SESSION['user'];
$productRepository = new ProductRepository();
$shopRepository = new ShopRepository();
$product = $productRepository->find($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = new Config();
    $db = $config->dbConnect();
    $oldImage = $product->getImage();

    if (!empty($_FILES["image"]["name"]) && $oldImage != $_FILES["image"]["name"]) {
        $image = $_FILES["image"]["name"];
        $target_dir = $ROOT . "img/uploads/";
        $target_file = basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (file_exists($target_dir . $target_file)) {
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $image = $oldImage;
    }

    $nom = !empty($_POST['name']) ? $_POST['name'] : $product->getNom();
    $prix = !empty($_POST['price']) ? $_POST['price'] : $product->getPrix();
    $description = !empty($_POST['description']) ? $_POST['description'] : $product->getDetails();

    $product->setNom($nom);
    $product->setPrix($prix);
    $product->setDetails($description);
    $product->setImage($image);
    $product->setShop($shopRepository->findOneBy(['id' => $user->getShop()]));
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

    $sql = $db->prepare("UPDATE product SET nom = :nom,  image = :image, prix = :prix, details = :details, shop_id = :shop_id WHERE id=:id");
    $sql->execute(dismount($product));
    header('Location: ./');
}

?>

<h4>Modification du produit</h4>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="dash-card">
                <div class="dash-header">
                    <h5 class="text-center">Modifier un produit</h5>
                </div>
                <div class="dash-body">
                    <form action="" class="row w-100" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6 text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nom du produit</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Nom du produit" value="<?php echo $product->getNom() ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Prix</label>
                                        <input type="numer" name="price" class="form-control" required placeholder="Prix" value="<?php echo $product->getPrix() ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" required rows="5"><?php echo $product->getDetails() ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                            <label for="">Image du produit</label>
                            <div class="logo-content" style="background: url('<?php echo $ROOT ?>img/uploads/<?php echo $product->getImage() ?>')">
                                <input type="file" name="image" id="imageSelect" class="d-none">
                                <div class="image-icon">
                                    <i class="fa fa-camera"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn-runb-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var imageBtn = document.querySelector('.image-icon');
    var imageSelector = document.querySelector('#imageSelect');
    var logoContent = document.querySelector('.logo-content');
    imageBtn.addEventListener('click', () => {
        imageSelector.click();
    })
    imageSelector.onchange = e => {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = (e) => {
            logoContent.style.backgroundImage = 'url(' + e.target.result + ')'
        }
        reader.readAsDataURL(file);
    }
</script>
<?php

include_once($ROOT . 'layout/back/footer.php') ?>